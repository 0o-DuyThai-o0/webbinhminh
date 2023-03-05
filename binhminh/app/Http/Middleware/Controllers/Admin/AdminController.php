<?php namespace App\Http\Controllers\admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App;
use File;
use Illuminate\Http\Request;
use DateTime;
use Illuminate\Support\Facades\Paginator;
use Hash;
use Session;
use Input;
use Carbon\Carbon;
//use \Illuminate\Support\Facades\DB;
//use Illuminate\Database\Eloquent\Model;
use Validator;
class AdminController extends Controller {
	protected $rules = [
		'username' => ['required', 'min:3'],
		  'password' => 'required|min:8',
	];
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index( Request $request)
	{
		$session_value='0';
		$users = App\Admin::paginate(5);
	//	var_dump($users);
		if (Session::has('admin'))
		{
			$session_value = Session::get('admin');
		}
		$admin = App\Admin::all();
		$admin = (array) $admin;
		//var_dump($admin);
		return view('admin.admin.index')->with('users',$users)->with('session_value',$session_value);

	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('admin/admin/create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store( Request $request)
	{

        $validator = Validator::make($request->all(), [
            'username' => 'required|min:3',
            'password' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect('admin/admin')
                        ->withErrors($validator)
                        ->withInput();
        }
		$user = new App\Admin;
		$user->name = $request->input('name');
		$user->username = $request->input('username');
		//$user->password = Hash::make($request->input('password'));
		$user->password =md5($request->input('password'));
		$user->status =	$request->input('status');		
		$user->save(); 
		return redirect('admin/admin');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$user = App\Admin::find($id);
		return view('admin/admin/show',compact('user'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$user = App\Admin::find($id);
		return view('admin/admin/edit',compact('user'))->with('id',$id);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Request $request,$id)
	{
		$trangthai=0;
		$user = App\Admin::find($id);
		if($request->input('name')==NULL) {
				$trangthai=1;
					if($user->status==true) {
				$user->status=false;
			}else {
				$user->status=true;
			}
		}else {
		$user->name = $request->input('name');
		$user->username = $request->input('username');
		//$user->password = Hash::make($request->input('password'));
		$user->password =md5($request->input('password'));
		$user->status =	$request->input('status');
	////	echo var_dump($user->status);
	//	exit();
		}
	//	echo var_dump($request->fullUrl());
	//	exit();

		$user->update();
		//return redirect('admin/admin');
		if($trangthai) {
		return redirect()->back();
		}
		else{
			return redirect('admin/admin');

		}

	}
	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$user = App\Admin::find($id);
		$user->delete();
		return redirect()->back();
		
	}
	public function login(Request $request) {

		$username=$request->input('username');
		//$password=$request->input('password');
		$password=md5($request->input('password'));
		//$username_admin = DB::table('admin')->where('username',$username)->first();
		//$username_admin = App\Admin::table('admin')->where('username',$username)->first();
		$admins = App\Admin::all();

		foreach( $admins as $admin ) {

		   if($admin->username==$username && $admin->password==md5($request->input('password')) )
		   {
		   		$session_admin=$admin->name;
		   	//	echo "đúng username and password";
		   	//	Session::put('admin',$session_admin );
		   	//	Session::put('admin_id',$admin->id);
		   	//	echo $value = Session::get('admin');
			//	echo $admin_id = Session::get('admin_id');
				//exit();

				$_SESSION['admin'] = $admin->name;
				$_SESSION['admin_id'] = $admin->id;
		   		return redirect('admin');
		   }
		}
		return redirect('admin/login');
		//echo var_dump($username);

	}
	public function logout() {
		//Session::forget('admin');
		//unset($_SESSION['admin']);
		session_destroy(); 
		return redirect('admin/login');
	}
	public function xoa_session_images($name){
	//exit($_SESSION[$name]);
			unset($_SESSION[$name]);
	
			return redirect()->back();
	}
    public function upload(Request $request){

		if (Input::file('image')->isValid()) {
			$current = Carbon::now();
			$year = $current->year;
			$month = $current->month;
			$destinationPath = 'uploads'; // upload path
			$url_folder=base_path().'/uploads';
			$url_folder_year=base_path().'/uploads'.'/'.$year;
			$url_folder_month=$url_folder_year.'/'.$month;	

		//	var_dump(File::isDirectory($url_folder));

			$fileName= Input::file('image')->getClientOriginalName();
			$all_files=File::files($url_folder_month);
			foreach($all_files as $all_file){
			//	echo $all_file.'<br>';
				if(File::isFile($url_folder_month.'/'.$fileName)) {

					exit('da ton` tai file anh roi');
				}
			}
			if(!File::isDirectory($url_folder_year)) {
				File::makeDirectory($url_folder_year, 0777, true);
				if(!File::isDirectory($url_folder_month)) {
					File::makeDirectory($url_folder_month, 0777, true);
				}
			}
			else {
				
				if(!File::isDirectory($url_folder_month)) {
					File::makeDirectory($url_folder_month, 0777, true);
				}
			}
			if(Input::file('image')->move($url_folder_month, $fileName)){ // uploading file to given path
				for($i=0;$i<10;$i++){
					$k='image_'.$i;
				//	echo $k.'<br/>';
					if(!isset($_SESSION[$k])) {
						$_SESSION[$k] = $url_image_1='/uploads'.'/'.$year.'/'.$month.'/'.$fileName;		
						break;
					}
				}
			}
			}
			return redirect()->back();
		}
	public function getfileindexfooter(){
				$url_img=base_path().'/resources/views/site/footer-s.blade.php';
				$footer_file= File::get($url_img);
				return view('admin.admin.edit-file-footer')->with('footer_file',$footer_file);

	}
	public function edit_file_index_footer(Request $request){
				$url_img=base_path().'/resources/views/site/footer-s.blade.php';
			//	$footer_file= File::get($url_img)."bóng đá số";
				
				$footer_file=$request->input('content');
				//	var_dump($footer_file); exit();
				File::put($url_img, $footer_file);
				
				return view('admin.admin.edit-file-footer')->with('footer_file',$footer_file);

	} 
	public function getfileindexlienhe(){
				$url_img=base_path().'/resources/views/site/lienhe-s.blade.php';
				$footer_file= File::get($url_img);
				return view('admin.admin.edit-file-lien-he')->with('footer_file',$footer_file);

	}
	public function edit_file_index_lienhe(Request $request){
				$url_img=base_path().'/resources/views/site/lienhe-s.blade.php';
			
				$footer_file=$request->input('content');
				File::put($url_img, $footer_file);
				
				return view('admin.admin.edit-file-lien-he')->with('footer_file',$footer_file);

	}
}

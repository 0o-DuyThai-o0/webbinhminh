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
class HomeController extends Controller {
    protected $rules = [
        'name' => ['required|name|unique:home'],
        'password' => 'required|min:8',
    ];
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index( Request $request)
    {
         $home = App\Home::all();
         return view('admin.home.index')->with('home',$home);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin/home/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store( Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3',
            'content' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect('admin/home')
                ->withErrors($validator)
                ->withInput();
        }
        $home = new App\Home;
        $home->name = $request->input('name');
        $home->content = $request->input('content');
        $home->home_alias=strtolower(convert_vi_to_en($request->input('name')));
        $json_img_2=null;
        for($i=0;$i<10;$i++){
            $k='image_field_create_'.$i;
            if(isset($_SESSION[$k])==true) {
                $json_img_1='{
						"url"  : "'.$_SESSION[$k].'",
						"is_avatar" : "1"
					}';
                if($i==0) {
                    $json_img_2=$json_img_2.$json_img_1;
                }else if($i>0) {
                    $json_img_2=$json_img_2.','.$json_img_1;
                }
            }
        }
        if(isset($json_img_2)==true) {
            $json_img_ok='['.$json_img_2.']';
            $home->image_field=$json_img_ok;
        }
        if($json_img_2==null) {
            $home->image_field='';
        }
        //$user->password = Hash::make($request->input('password'));
//        $user->password =md5($request->input('password'));
//        $user->status =	$request->input('status');
        if($home->save()) {

            for($i=0;$i<10;$i++){
                $k='image_field_create_'.$i;
                unset($_SESSION[$k]);
            }
        }

        return redirect('admin/home');
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
        $home_edit = App\Home::find($id);
        return view('admin/home/edit')->with('home_edit',$home_edit)->with('id',$id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request,$id)
    {

        $home = App\Home::find($id);

            $home->name = $request->input('name');
            $home->content = $request->input('contents');
        //$user->password = Hash::make($request->input('password'));
//            $home->password =md5($request->input('password'));
//            $home->status =	$request->input('status');
            ////	echo var_dump($user->status);
            //	exit();

        //	echo var_dump($request->fullUrl());
        //	exit();

        $home->update();

            return redirect('admin/home');



    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $home = App\Home::find($id);
        $home->delete();
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
    public function them_anh_field_create(Request $request){
        //	echo $request->input('Image');
        //	exit();
        for($i=0;$i<10;$i++){
            $s='image_field_create_'.$i;
            if(!isset($_SESSION[$s])) {
                $_SESSION[$s] = $request->input('Image');
                break;
            }
        }
        return redirect()->back();

    }
    public function xoa_anh_field_home($id,$number) {
        //echo $id."---".$number;
        $home = App\Home::find($id);
        $img_xs=json_decode($home->image_field,1);
        unset($img_xs[$number]);
        sort($img_xs);

        if(count($img_xs)) {
            $home->image_field=json_encode($img_xs); //array to json
            //	echo $cat->category_avatar;
            //	exit();
        }else $home->image_field='';
        if($home->save()) {
            return redirect()->back();
        }

    }

    //xóa ảnh edit field home
    public function them_anh_field_home($id,Request $request) {
        $img_new=$request->input('Image');
        if($img_new) {
            $home = App\Home::find($id);
            $json_img_2='';
            if($home->image_field) {
                $img_xs=json_decode($home->image_field,1);
                //	echo count($img_xs);
                if(isset($img_xs) && count($img_xs) > 0) {

                    $s=0;
                    foreach ($img_xs as $img_x) {
                        echo "<img class='img_avatar' src=".$img_x['url'].">";
                        $json_img_1='{
									"url"  : "'.$img_x['url'].'",
									"is_avatar" : "1"
								}';
                        if($s==0) {
                            $json_img_2=$json_img_2.$json_img_1;
                        }else if($s>0) {
                            $json_img_2=$json_img_2.','.$json_img_1;
                        }

                        $s=$s+1;


                    }

                    $json_img_new='{"url"  : "'.$img_new.'","is_avatar" : "1"}';
                    $json_img_2="[".$json_img_2.','.$json_img_new."]";
                }



            }else {

                $json_img_new='{"url"  : "'.$img_new.'","is_avatar" : "1"}';

                $json_img_2="[".$json_img_new."]";
                //	exit($json_img_2);

            }


            echo $json_img_2;
            //	exit();
            //	exit();

            $json_img_2=str_replace(' ','',$json_img_2);

            $home_save = App\Home::find($id);
            $home_save->image_field=$json_img_2;

            if($home_save->save()) {
                return redirect()->back();
            }
        }


    }
}

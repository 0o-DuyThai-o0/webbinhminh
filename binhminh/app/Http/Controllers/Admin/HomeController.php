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
use DB;
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
         $vitri = DB::table('vi_tri_field')->get();
         $dinhdang = DB::table('dinh_dang_field')->get(); 
         return view('admin.home.index')->with('home',$home)->with('vitri',$vitri)->with('dinh_dang',$dinhdang);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()

    {     
        $ten_dinh_dang = DB::table('dinh_dang_field')->get();
        //$vi_tri_field = DB::table('vi_tri_field')->get();
		
	//	$vi_tri_field = DB::table('home')->get();
		
		$vi_tri_field = DB::table('home')->select('id_vitri')->get();
		
	//	var_dump($vi_tri_field);
	//	exit();
	//	echo "a is " . is_array($vi_tri_field) . "<br>";
		
		//echo max($vi_tri_field);
	//	exit();
		
        return view('admin/home/create')->with('ten_dinh_dang',$ten_dinh_dang)->with('vi_tri_field',$vi_tri_field);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store( Request $request)
    {
        $home = new App\Home;
        $home->content = $request->input('content');
        $home->id_dinhdang = $request->input('ten_dinh_dang');
        $home->id_vitri = $request->input('ten_vi_tri');
        $home->admin_id = $_SESSION['admin_id'];
        $home->status =1;
		$home->mo_ta =$request->input('mo_ta');
		
     //    $json_img_2=null;
     //    for($i=0;$i<10;$i++){
     //        $k='image_field_create_'.$i;
     //        if(isset($_SESSION[$k])==true) {
     //            $json_img_1='{
                    //  "url"  : "'.$_SESSION[$k].'",
                    //  "is_avatar" : "1"
                    // }';
     //            if($i==0) {
     //                $json_img_2=$json_img_2.$json_img_1;
     //            }else if($i>0) {
     //                $json_img_2=$json_img_2.','.$json_img_1;
     //            }
     //        }
     //    }
     //    if(isset($json_img_2)==true) {
     //        $json_img_ok='['.$json_img_2.']';
     //        $home->image_field=$json_img_ok;
     //    }
     //    if($json_img_2==null) {
     //        $home->image_field='';
     //    }
        //$user->password = Hash::make($request->input('password'));
//        $user->password =md5($request->input('password'));
//        $user->status =   $request->input('status');
        if($home->save()) {

            // for($i=0;$i<10;$i++){
            //     $k='image_field_create_'.$i;
            //     unset($_SESSION[$k]);
            // }
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
         $ten_dinh_dang = DB::table('dinh_dang_field')->get();
        //$vi_tri_field = DB::table('vi_tri_field')->get();
		
		$vi_tri_field = DB::table('home')->select('id_vitri')->get();
		
        return view('admin/home/edit')->with('home_edit',$home_edit)->with('id',$id)->with('ten_dinh_dang',$ten_dinh_dang)->with('vi_tri_field',$vi_tri_field);
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
        $home->content = $request->input('content');
        $home->id_dinhdang = $request->input('ten_dinh_dang');
        $home->id_vitri = $request->input('ten_vi_tri');
		//echo $home->id_vitri;
		//exit();
        $home->admin_id = $_SESSION['admin_id'];
        $home->status =1;
		$home->mo_ta =$request->input('mo_ta');
		
		
        //$user->password = Hash::make($request->input('password'));
//            $home->password =md5($request->input('password'));
//            $home->status =   $request->input('status');
            ////    echo var_dump($user->status);
            //  exit();

        //  echo var_dump($request->fullUrl());
        //  exit();

        $home->update();

            return redirect('admin/home');



    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */

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
                //  echo "đúng username and password";
                //  Session::put('admin',$session_admin );
                //  Session::put('admin_id',$admin->id);
                //  echo $value = Session::get('admin');
                //  echo $admin_id = Session::get('admin_id');
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

     public function xoa_field(Request $request){
         
         $array_product=$request->input('xoafield');
         $select_publisher=$request->input('publish_unpublish');
         $error=null;
          if($select_publisher==1) {
                if(count($array_product) >0) {
                    foreach($array_product as $product ){
                        
                        $kaka = App\Home::find($product);
                        
                        $kaka->delete();
                        Session::flash('message1', 'Xóa thành công');
                        return redirect()->back();
                    }
                }else {
                     Session::flash('message1', 'Không có field nào được chọn');
                     return redirect()->back();
                }
            
        }

    }
}   
 
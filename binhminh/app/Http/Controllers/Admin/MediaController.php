<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Paginator;
//use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\Paginator;

use File;
use Illuminate\Contracts\Filesystem\Factory;
use Storage;
use Illuminate\Contracts\Filesystem\Filesystem;
use Input;
use App\Fileentry;

 
use Illuminate\Http\Response;
class MediaController extends Controller {

	public function index()
	{

		$url_folder=base_path().'/uploads';
	//	$size=base_path().'\uploads\3.jpg';
		//echo $size;
	//	$ttt= File::get($size);
	//	var_dump($ttt);
	//	$size=File::size($size);
	//	echo $size;
		$muc_con=File::directories($url_folder);
		$all_file=File::files($url_folder);
		$aa=File::allFiles($url_folder);

		var_dump($all_file);

		$token_1=$url_folder;
		return view('admin.media.index')->with('all_file',$all_file)->with('url_folder',$url_folder)->with('muc_con',$muc_con)->with('token_1',$token_1);
	}

	public function delete_image($all_file_1,Request $request)
	{
		    $data = Input::all();
		$name= $request->input('name_image');
		$token_folder=$request->input('name_folder_token');

		if(File::Delete($name) )
		{
			echo "ok";
		//	exit();
		}
		return redirect()->back();
		//    return redirect()->back()->withInput(Input::except($token_folder));
		    
	}

	public function get_view_folder( $name=null,$name1=null,$name2=null)
	{

		$url_img=base_path().'/resources/views/site/footer-s.blade.php';
		$ttt= File::get($url_img);
	//	File::put($url_img, $ttt);
		//var_dump($ttt);
		
		
		
		if($name) {
			$name='/'.$name;
		}
		if($name1) { $name=$name.'/'.$name1; }
		if($name2) { $name=$name.'/'.$name2; }
		$url_folder=base_path().'/uploads'.$name;

		$muc_con=File::directories($url_folder);
		$all_file=File::files($url_folder);
		$aa=File::allFiles($url_folder);
		//var_dump($muc_con);

		$all_file=array_values($all_file);

		$token_1=$url_folder;
		return view('admin.media.index')->with('all_file',$all_file)->with('url_folder',$url_folder)->with('muc_con',$muc_con);
	}

	public function view_folder($name=null,Request $request) {


		$name=  $request->input('name_folder');

		echo $name;
	//exit();

		$url_folder=$name;

		$muc_con=File::directories($url_folder);
		$all_file=File::files($url_folder);

	//exit();
		$token_1=$name;
		return view('admin.media.index')->with('all_file',$all_file)->with('url_folder',$url_folder)->with('muc_con',$muc_con);
	}

}

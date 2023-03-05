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
use Validator;
use DB;
class NewsController extends Controller {

	public function index( Request $request)
	{
		$session_value='0';
		$all_news = count(App\News::all());
		$all_news_1=count(DB::table('news')->where('status_new', '>',0)->get());
		$all_news_0=$all_news - $all_news_1;
		$news=DB::table('news')->where('status_new', '>',0)->orderBy('id', 'DESC')->paginate(count_phan_trang);

		$catnews = App\Catnews::all();
		$admin_changes = App\Admin::all();

		$catnew_parents = DB::table('cat_new')->where('parent_id', 0)->get();
		if(isset($_SESSION['admin'])==true) {
		$session_value = $_SESSION['admin'];
		}	
	
		return view('admin.news.index')->with('news',$news)->with('session_value',$session_value)->with('all_news',$all_news)->with('all_news_0',$all_news_0)->with('all_news_1',$all_news_1)->with('catnews',$catnews)->with('catnew_parents',$catnew_parents)->with('admin_changes',$admin_changes);

	}

	public function create()
	{
		$catnews = App\Catnews::all();
		$admin_changes = App\Admin::all();
		$catnews_parents = DB::table('cat_new')->where('parent_id', 0)->get();
		
		
		return view('admin/news/create')->with('catnews',$catnews)->with('catnews_parents',$catnews_parents)->with('admin_changes',$admin_changes);
	}
	
	public function store( Request $request)
	{
		$new = new App\News;
		$new->name = $request->input('name');
        $new->news_excerpt = $request->input('excerpt');
		$new->new_alias =strtolower(convert_vi_to_en($request->input('name')));
	
		$new->content = $request->input('content');
		$new->the_tu_khoa = $request->input('the_tu_khoa');
		$new->the_gioi_thieu = $request->input('the_gioi_thieu');
		$new->cat_new_id = $request->input('cat_new_id');
		$new->admin_id=$_SESSION['admin_id'];

		$json_img_2=null;
			for($i=0;$i<10;$i++){
				$k='image_create_'.$i;
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
				$new->image_list=$json_img_ok;
			}
			if($json_img_2==null) {
				$new->image_list='';
			}
		
		if($request->input('hoat_dong')) {
			$new->status_new=$request->input('hoat_dong');
		}
		if($new->save()) {
			
		return redirect('admin/news');
		}
	}


	public function show($id)
	{

	}


	public function edit($id)
	{
		$new = App\News::find($id);
		$catnews = App\Catnews::all();
		$admin_changes = App\Admin::all();
		$catnews_parents = DB::table('cat_new')->where('parent_id', 0)->get();		
		
		return view('admin/news/edit')->with('new',$new)->with('catnews',$catnews)->with('admin_changes',$admin_changes)->with('catnews_parents',$catnews_parents);
	}
	public function update($id ,Request $request)
	{

		
		$new = App\News::find($id);
		$new->name = $request->input('name');
        $new->news_excerpt = $request->input('excerpt');
		
		$new->new_alias =$request->input('new_alias');
		$new->cat_new_id=$request->input('cat_new_id');
		$new->content=$request->input('content');
		
//echo $request->input('cat_new_id');
//exit();
		$new->the_tu_khoa=$request->input('the_tu_khoa');
		$new->the_gioi_thieu=$request->input('the_gioi_thieu');

		if($request->input('hoat_dong')) {
		$new->status_new=$request->input('hoat_dong');
		}else {
			$new->status_new=0;
		}
		if($new->save()) {
			
				for($i=0;$i<10;$i++){
					$k='image_edit_'.$i;
					unset($_SESSION[$k]);
				}
		}
		return redirect('admin/news');
	}
	public function s_search(Request $request) {
		$s_search = $request->input('s_search');
		$products=DB::table('news')->where('name', 'LIKE', "%$s_search%")->orderBy('id', 'DESC')->paginate(count_phan_trang);
		if(isset($_SESSION['admin'])==true) {
		$session_value = $_SESSION['admin'];
		}

		return redirect()->action('Admin\NewsController@get_s_search', $s_search);

	}
	public function get_s_search($s_search) {
		$all_news = count(App\News::all());
		$all_news_1=count(DB::table('news')->where('status_new', '>',0)->get());
		$all_news_0=$all_news - $all_news_1;
		$catnews = App\Catnews::all();
		$admin_changes = App\Admin::all();
		$catnews_parents = DB::table('cat_new')->where('parent_id', 0)->get();
		$news=DB::table('news')->where('name', 'LIKE', "%$s_search%")->orderBy('id', 'DESC')->paginate(count_phan_trang);
		if(isset($_SESSION['admin'])==true) {
		$session_value = $_SESSION['admin'];
		}

		return view('admin.news.index')->with('news',$news)->with('session_value',$session_value)->with('all_news',$all_news)->with('all_news_0',$all_news_0)->with('all_news_1',$all_news_1)->with('s_search',$s_search)->with('catnews',$catnews)->with('catnews_parents',$catnews_parents)->with('admin_changes',$admin_changes);
	}
	public function get_all_va_bannhap($all_va_bannhap)
	{
		$session_value='0';
		
		$all_news = count(App\News::all());
		$all_news_1=count(DB::table('news')->where('status_new', '=',1)->get());
		$all_news_0=$all_news - $all_news_1;
		$admin_changes = App\Admin::all();
		$delete_new=0;
		

		$catnew_parents = DB::table('cat_new')->where('parent_id', 0)->get();
		if(isset($_SESSION['admin'])==true) {
		$session_value = $_SESSION['admin'];
		}		
		
		if($all_va_bannhap==1) {

			$news=DB::table('news')->orderBy('id', 'DESC')->paginate(count_phan_trang);
		}elseif ($all_va_bannhap==-1) {
			
			$news=DB::table('news')->where('status_new', '=',0)->orderBy('id', 'DESC')->paginate(count_phan_trang);
			$delete_new=1;
		}
		
		$catnews_parents = DB::table('cat_new')->where('parent_id', 0)->get();
		$catnews = App\Catnews::all();
		if(isset($_SESSION['admin'])==true) {
		$session_value = $_SESSION['admin'];
		}

		return view('admin.news.index')->with('news',$news)->with('session_value',$session_value)->with('all_news',$all_news)->with('all_news_0',$all_news_0)->with('all_news_1',$all_news_1)->with('admin_changes',$admin_changes)->with('catnews_parents',$catnews_parents)->with('catnews',$catnews)->with('delete_new',$delete_new)->with('catnew_parents',$catnew_parents);
		
	}
	public function xu_ly(Request $request) {


	$publish_unpublish=$request->input('publish_unpublish');
	
	$publish_unpublish_1=$request->input('publish_unpublish_1');

	if($publish_unpublish==-1) {

		$publish_unpublish=$publish_unpublish_1;

	}
	$array_news=$request->input('checkbox');
	
	//var_dump($array_product);
	//exit();
	$error=null;
	if($request->input('submit_1')=='Áp dụng') {
		if($publish_unpublish=='hoat_dong') {

				if(count($array_news) >0) {
					foreach($array_news as $array_new ){
						//echo $product."======";
						$new = App\News::find($array_new);
						$new->status_new = 1;
						$new->save(); 
					}
				}else {
					$error="Không có sản phẩm nào dc chọn";
				}
		}else if($publish_unpublish=='ban_nhap') {
				if(count($array_news) >0) {
					foreach($array_news as $array_new ){
						//echo $product."======";
						$new = App\News::find($array_new);
						$new->status_new = 0;
						$new->save(); 
					}
				}else {
					$error="Không có sản phẩm nào dc chọn";
				}
		}else if($publish_unpublish=='xoa_vinh_vien') {
				if(count($array_news) >0) {
					foreach($array_news as $array_new ){
						//echo $product."======";
						$new = App\News::find($array_new);
						
						$new->delete(); 
					}
				}else {
					$error="Không có sản phẩm nào dc chọn";
				}
			
		}
		
	}else if($request->input('submit_1')=='Lọc') {

		$tac_gia=$request->input('tac_gia');
		$cat11=$request->input('cat');

		return redirect()->action('Admin\NewsController@loc_san_pham',[$tac_gia,$cat11]);
	}
	if($request->input('submit_2')){

		$tac_gia_1=$request->input('tac_gia1');
		$cat11=$request->input('cat1');
		return redirect()->action('Admin\NewsController@loc_san_pham',[$tac_gia_1,$cat11]);
	}
	return redirect()->back()->withErrors($error);
	}
	public function loc_san_pham($tac_gia,$cat11 ) {
		if($tac_gia==-1 && $cat11==0){
			return redirect('admin/news');
		}
		
		if($tac_gia>0 && $cat11>0) {
			$news = DB::table('news')->where('cat_new_id',$cat11)->where('admin_id',$tac_gia)->orderBy('id', 'DESC')->paginate(count_phan_trang);
		}
		elseif($cat11>0) {
					$news = DB::table('news')->where('cat_new_id',$cat11)->orderBy('id', 'DESC')->paginate(count_phan_trang);

			}elseif ($tac_gia>0) {
					$news = DB::table('news')->where('admin_id',$tac_gia)->orderBy('id', 'DESC')->paginate(count_phan_trang);
			}

		
		if(isset($_SESSION['admin'])==true) {
		$session_value = $_SESSION['admin'];
		}
		$all_news = count(App\News::all());
		$all_news_1=count(DB::table('news')->where('status_new', '>',0)->get());
		$all_news_0=$all_news - $all_news_1;
		$catnews = App\Catnews::all(); 
		$s_search=null;
		$catnew_parents = DB::table('cat_new')->where('parent_id', 0)->get();
		$admin_changes = App\Admin::all();
		
		return view('admin.news.index')->with('news',$news)->with('session_value',$session_value)->with('all_news',$all_news)->with('all_news_0',$all_news_0)->with('all_news_1',$all_news_1)->with('s_search',$s_search)->with('catnews',$catnews)->with('catnew_parents',$catnew_parents)->with('cat11',$cat11)->with('admin_changes',$admin_changes)->with('tac_gia',$tac_gia);

	}
	public function them_anh_dai_dien_create_new(Request $request){
	//	echo $request->input('Image');
		//exit();
				for($i=0;$i<10;$i++){
					$s='image_create_'.$i;
					if(!isset($_SESSION[$s])) {
						 $_SESSION[$s] = $request->input('Image');
						break;
					}
				}
		return redirect()->back();
		
	}
	public function xoa_anh_dai_dien_create_new($id,Request $request){
				for($i=0;$i<10;$i++){
					$s='image_create_'.$i;
					if( $i==$id){
						unset($_SESSION[$s]);
						break;
					}

				}
		return redirect()->back();
		
	}
	public function xoa_anh_dai_dien_new($id,$number) {
		//echo $id."---".$number;
		$new = App\News::find($id);
		$img_xs=json_decode($new->image_list,1);
		unset($img_xs[$number]);
		sort($img_xs);
		
		//echo json_encode($img_xs);
		if(count($img_xs)) {
		$new->image_list=json_encode($img_xs); //array to json
	//	echo $new->image_list;
	//	exit();
		}else $new->image_list='';
			if($new->save()) {
				return redirect()->back();
			}
		
	}
	public function them_anh_dai_dien_new($id,Request $request) {
		$img_new=$request->input('Image');
		if($img_new) {
			$new = App\News::find($id);

		//	exit();
			$json_img_2='';
						if($new->image_list) {
						$img_xs=json_decode($new->image_list,1);
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
						$json_img_2=str_replace(' ','',$json_img_2);
		//	$product->image_list=$json_img_2;
			
		//	exit($product->image_list);

		$new_save = App\News::find($id);
		$new_save->image_list=$json_img_2;
			if($new_save->save()) {
				return redirect()->back();
			}
		}
		
		
	}
}

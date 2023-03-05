<?php namespace App\Http\Controllers\admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App;
use File;
use Illuminate\Http\Request;
use Session;
use Validator;
use DB;
use Input;
use Carbon\Carbon;
class CatController extends Controller {

	public function index( Request $request)
	{
		$session_value='0';
		$cats1 = App\Cat::all();
		$cats2 = App\Cat::all();
		$product_cat = App\Product::all();
		$cats = App\Cat::paginate(5);
		$cat_parents = DB::table('cat')->where('parent_id', 0)->get();
		//var_dump($cat_parents);

		if (Session::has('admin'))
		{
			$session_value = Session::get('admin');
		}
	//	echo $admin =App\Cat::find(6)->admin->name;
		//echo var_dump($cat);
	//	exit();

		return view('admin.cat.index')->with('cats',$cats)->with('cats1',$cats1)->with('cats2',$cats2)->with('session_value',$session_value)->with('cat_parents',$cat_parents)->with('product_cat',$product_cat);
		
				
	}
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$cats=App\Cat::all();
		//echo var_dump($admins);
		$cat_parents = DB::table('cat')->where('parent_id', 0)->get();

		return view('admin.cat.create')->with('cats',$cats)->with('cat_parents',$cat_parents);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store( Request $request)
	{ 	
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3|unique:cat,name',

        ]);
        if ($validator->fails()) {
            return redirect('admin/cat')
                        ->withErrors($validator)
                        ->withInput();
        }
		$cat = new App\Cat;
		$cat->name = $request->input('name');
		$cat->excerpt_cat = $request->input('excerpt_cat');
		$cat->content_cat = $request->input('content_cat');
		$cat->cat_alias = $request->input('cat_alias');
		$cat->cat_alias=strtolower(convert_vi_to_en($request->input('name')));
		
		
				$json_img_2=null;
			for($i=0;$i<10;$i++){
				$k='image_cat_create_'.$i;
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
				$cat->banner_category=$json_img_ok;
			}
			if($json_img_2==null) {
				$cat->banner_category='';
			}
		
				$json_img_2=null;
				
			for($i=0;$i<10;$i++){ 
			
				$k='image_cat_avatar_create_'.$i;
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
				$cat->category_avatar=$json_img_ok;
			}
			if($json_img_2==null) {
				$cat->category_avatar='';
			}
		
		$cat->parent_id =$request->input('parent_id');
		$cat->admin_id=$_SESSION['admin_id'];
		
		
		
	//	echo $cat->category_avatar;
		
	//	exit();
		
		
		
				if($cat->save()) {

			for($i=0;$i<10;$i++){
				$k='image_cat_create_'.$i;
				unset($_SESSION[$k]);
			}
						for($i=0;$i<10;$i++){
				$k='image_cat_avatar_create_'.$i;
				unset($_SESSION[$k]);
			}
		}
		return redirect('admin/cat');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		
		$cat = App\Cat::find($id);
		$cats = App\Cat::all();

		$cat_parents = DB::table('cat')->where('parent_id', 0)->get();

		return view('admin/cat/edit')->with('cat',$cat)->with('id',$id)->with('cats',$cats)->with('cat_parents',$cat_parents);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Request $request,$id)
	{

		$cat = App\Cat::find($id);
		$cat->name = $request->input('name');
		$cat->excerpt_cat = $request->input('excerpt_cat');
		$cat->content_cat = $request->input('content_cat');
		//$cat->cat_alias = $request->input('cat_alias');
		$cat->cat_alias=strtolower(convert_vi_to_en($request->input('name')));
		$cat->parent_id =$request->input('parent_id');
	////	echo var_dump($cat->status);
	//	exit();


		$cat->update();
		return redirect('admin/cat');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$cat = App\Cat::find($id);
		$cat->delete();
		return redirect('admin/cat');
	}
	public function s_search(Request $request) {
		$s_search = $request->input('s_search');
		$products=DB::table('cat')->where('name', 'LIKE', "%$s_search%")->orderBy('id', 'DESC')->paginate(count_phan_trang);
		if(isset($_SESSION['admin'])==true) {
		$session_value = $_SESSION['admin'];
		}
	//	exit($s_search);
		return redirect()->action('Admin\CatController@get_s_search', $s_search);
		

	}
	public function get_s_search($s_search) {
	
		$session_value='0';
		//$cats1 = App\Cat::all();
		$cats1=DB::table('cat')->where('name', 'LIKE', "%$s_search%")->orderBy('id', 'DESC')->paginate(count_phan_trang);
	//	var_dump(count($cats1));
	//	exit();
		$cats = App\Cat::paginate(5);
		$cat_parents = DB::table('cat')->where('parent_id', 0)->get();
		//var_dump($cat_parents);

		if (Session::has('admin'))
		{
			$session_value = Session::get('admin');
		}
	//	echo $admin =App\Cat::find(6)->admin->name;
		//echo var_dump($cat);
	//	exit();
		return view('admin.cat.index')->with('cats',$cats)->with('cats1',$cats1)->with('session_value',$session_value)->with('cat_parents',$cat_parents)->with('s_search',$s_search);	
	}
	public function get_all_va_bannhap($all_va_bannhap)
	{
		$session_value='0';
		$cats1 = App\Cat::all();
		$cats2 = App\Cat::all();
		//echo $all_va_bannhap;
	
		//$cats = App\Cat::paginate(5);
		if($all_va_bannhap==1) {

			$cats=DB::table('cat')->orderBy('id', 'DESC')->paginate(count_phan_trang);
		}elseif ($all_va_bannhap==-1) {
			
			$cats=DB::table('cat')->where('status_cat', '=',0)->orderBy('id', 'DESC')->paginate(count_phan_trang);
			$delete_new=1;
		}
		
		$cat_parents = DB::table('cat')->where('parent_id', 0)->get();
		

		if(isset($_SESSION['admin'])==true) {
		$session_value = $_SESSION['admin'];
		}	
	//	echo $admin =App\Cat::find(6)->admin->name;
		//echo var_dump($cat);
	//	exit();
		return view('admin.cat.index')->with('cats',$cats)->with('cats1',$cats1)->with('cats2',$cats2)->with('session_value',$session_value)->with('cat_parents',$cat_parents);		
	}
	public function xu_ly_form_cat(Request $request){
		
	$publish_unpublish=$request->input('publish_unpublish');

		$array_menusitem=$request->input('checkbox');

	//echo $array_menusitem['1'];
	
//	var_dump($array_menusitem);
							foreach($array_menusitem as $menusitem ){
								echo $menusitem; echo "<br/>";
							}
//	exit("vao tơi đâu ròi");

		
		if($request->input('submit_1')=='Áp dụng') {
			if($publish_unpublish=='hoat_dong') {

					if(count($array_menusitem) >0) {
						foreach($array_menusitem as $menusitem ){
							
							$menusitem = App\Cat::find($menusitem);
							$menusitem->status_cat = 1;
							$menusitem->save(); 
						}
					}else {
						$error="Không có sản phẩm nào dc chọn";
					}
			}else if($publish_unpublish=='ban_nhap') {
					if(count($array_menusitem) >0) {
						foreach($array_menusitem as $menusitem ){

							$menusitem = App\Cat::find($menusitem);
							$menusitem->status_cat = 0;
							$menusitem->save(); 
						}
					}else {
						$error="Không có sản phẩm nào dc chọn";
					}
			}else if($publish_unpublish=='xoa_vinh_vien') {

					if(count($array_menusitem) >0) {
						foreach($array_menusitem as $menusitem ){

							$menusitem = App\Cat::find($menusitem);
							$menusitem->delete();
						}
					}				
			}
		}
		return redirect()->back();
		
	}
	public function them_anh_danh_muc($id,Request $request) {
		$img_new=$request->input('Image');
		if($img_new) {
			$cats = App\Cat::find($id);

		//	exit();
			$json_img_2='';
						if($cats->category_avatar) {
						$img_xs=json_decode($cats->cats,1);
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

		$product_save = App\Cat::find($id);
		$product_save->image_list=$json_img_2;
			if($product_save->save()) {
				return redirect()->back();
			}
		}
		
		
	}
		public function them_anh_dai_dien_cat_create(Request $request){
	//	echo $request->input('Image');
	//	exit();
				for($i=0;$i<10;$i++){
					$s='image_cat_create_'.$i;
					if(!isset($_SESSION[$s])) {
						 $_SESSION[$s] = $request->input('Image');
						break;
					}
				}
		return redirect()->back();
		
	}
	public function xoa_anh_dai_dien_cat_create($id,Request $request){
//echo $id;
//exit();
				for($i=0;$i<10;$i++){
					$s='image_cat_create_'.$i;
					if( $i==$id){
						unset($_SESSION[$s]);
						break;
					}

				}
		return redirect()->back();
		
	}
	public function them_anh_dai_dien_cat_avatar_create(Request $request){
	//	echo $request->input('Image');
	//	exit();
				for($i=0;$i<10;$i++){
					$s='image_cat_avatar_create_'.$i;
					if(!isset($_SESSION[$s])) {
						 $_SESSION[$s] = $request->input('Image');
						break;
					}
				}
		return redirect()->back();
		
	}
		public function xoa_anh_dai_dien_cat_avatar_create($id,Request $request){

				for($i=0;$i<10;$i++){
					$s='image_cat_avatar_create_'.$i;
					if( $i==$id){
						unset($_SESSION[$s]);
						break;
					}

				}
		return redirect()->back();
		
	}
	
	public function xoa_anh_dai_dien_cat_avatar($id,$number) {
		//echo $id."---".$number;
		$cat = App\Cat::find($id);
		$img_xs=json_decode($cat->category_avatar,1);
		unset($img_xs[$number]);
		sort($img_xs);

		if(count($img_xs)) {
		$cat->category_avatar=json_encode($img_xs); //array to json
	//	echo $cat->category_avatar;
	//	exit();
		}else $cat->category_avatar='';
			if($cat->save()) {
				return redirect()->back();
			}
		
	}
		public function them_anh_dai_dien_cat_avatar($id,Request $request) { 
		$img_new=$request->input('Image');
		if($img_new) {
			$cat = App\Cat::find($id);
			$json_img_2='';
						if($cat->category_avatar) {
						$img_xs=json_decode($cat->category_avatar,1);
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

						$cat_save = App\Cat::find($id);
						$cat_save->category_avatar=$json_img_2;
		
			if($cat_save->save()) {
				return redirect()->back();
			}
		}
		
		
	}
		public function them_anh_dai_dien_cat_danh_muc($id,Request $request) { 
		$img_new=$request->input('Image');
		
		//exit($img_new);
		
		if($img_new) {
			$cat = App\Cat::find($id);
			$json_img_2='';
						if($cat->banner_category) {
						$img_xs=json_decode($cat->banner_category,1);
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
								
								
						}
						
						
echo $json_img_2;//	exit($json_img_2);
							//	exit();
					//	exit();
					
						$json_img_2=str_replace(' ','',$json_img_2);

						$cat_save = App\Cat::find($id);
						
		$cat_save->banner_category=$json_img_2;
		
			if($cat_save->save()) {
				return redirect()->back();
			}
		}
		
		
	}
}

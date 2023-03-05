<?php namespace App\Http\Controllers\admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App;
use Illuminate\Http\Request;
use Session;
use Validator;
use DB;
class CatnewsController extends Controller {

	public function index( Request $request)
	{
		$session_value='0';
		$catnews1 = App\Catnews::all();
		$catnews2 = App\Catnews::all();
		$catnews = App\Catnews::paginate(5);
		$catnews_parents = DB::table('cat_new')->where('parent_id', 0)->get();
		
		//var_dump($cat_parents);

		if (Session::has('admin'))
		{
			$session_value = Session::get('admin');
		}
	//	echo $admin =App\Cat::find(6)->admin->name;
		//echo var_dump($cat);
	//	exit();
		return view('admin.catnews.index')->with('catnews',$catnews)->with('catnews1',$catnews1)->with('catnews2',$catnews2)->with('catnews_parents',$catnews_parents);
	//	return view('admin.catnews.index');
	}
	public function create()
	{
		return view('admin.catnews.create');
	}
	public function store( Request $request)

	{
		$cat_new = new App\Catnews;
		$cat_new->name = $request->input('name');
		$cat_new->cat_new_alias =strtolower(convert_vi_to_en($request->input('name')));
        $cat_new->parent_id =$request->input('parent_id');		
		$cat_new->the_tu_khoa = $request->input('the_tu_khoa');
		$cat_new->the_gioi_thieu = $request->input('the_gioi_thieu');
		$cat_new->admin_id=$_SESSION['admin_id'];
		if($request->input('hoat_dong')) {
			$cat_new->status_cat_new=$request->input('hoat_dong');
		}
		if($cat_new->save()) {
			
		return redirect('admin/cat-new');
		}
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
		
		$catnew = App\Catnews::find($id);
		$catnews = App\Catnews::all();
		$catnews1 = App\Catnews::all();

		$Catnew_parents = DB::table('cat_new')->where('parent_id', 0)->get();

		return view('admin/catnews/edit')->with('catnew',$catnew)->with('id',$id)->with('catnews',$catnews)->with('catnews1',$catnews1)->with('Catnew_parents',$Catnew_parents);
	
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Request $request,$id)
	{
		
		$catnew = App\Catnews::find($id);
		$catnew->name = $request->input('name');
		$catnew->cat_new_alias = $request->input('cat_new_alias');
		$catnew->parent_id =$request->input('parent_id');
		$catnew->the_tu_khoa =$request->input('the_tu_khoa');
		$catnew->the_gioi_thieu =$request->input('the_gioi_thieu');

		if($request->input('hoat_dong')) {
			$catnew->status_cat_new=$request->input('hoat_dong');
		}
		if($catnew->save()) {
		return redirect()->back();
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

	}
	public function xu_ly_form_catnew(Request $request){
		
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
							
							$menusitem = App\Catnews::find($menusitem);
							$menusitem->status_cat_new = 1;
							$menusitem->save(); 
						}
					}else {
						$error="Không có sản phẩm nào dc chọn";
					}
			}else if($publish_unpublish=='ban_nhap') {
					if(count($array_menusitem) >0) {
						foreach($array_menusitem as $menusitem ){

							$menusitem = App\Catnews::find($menusitem);
							$menusitem->status_cat_new = 0;
							$menusitem->save(); 
						}
					}else {
						$error="Không có sản phẩm nào dc chọn";
					}
			}else if($publish_unpublish=='xoa_vinh_vien') {

					if(count($array_menusitem) >0) {
						foreach($array_menusitem as $menusitem ){

							$menusitem = App\Catnews::find($menusitem);
							$menusitem->delete();
						}
					}				
			}
		}
		return redirect()->back();
		
	}

}

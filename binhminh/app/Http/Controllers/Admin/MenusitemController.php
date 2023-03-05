<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Paginator;
use Hash;
use Session;

use Validator;

class MenusitemController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		$menusitem = new App\Menusitem;
		$menusitem->name = $request->input('name_create_menusitem');
		$menusitem->menus_alias = $request->input('alias_create_menusitem');
		$menusitem->menus_item_id_parent=$request->input('menus_item_id'); 

		$menusitem->menus_id = $request->input('name_create_menusitem_id');		
		$menusitem->status_menusitem = 1;
		$radio_botton = $request->input('change_s_s');	
		if($radio_botton==1){
			
			$menusitem->menus_item_url = $request->input('menu_item_url');	
			$menusitem->cat_id_show = 0;
		}else if($radio_botton==2){
			$menusitem->menus_item_url = null;
			$menusitem->cat_id_show = $request->input('cat_id_show');
			
		} 
 
		$menusitem->save();  
		return redirect()->back();
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
		$menuitem = App\Menusitem::find($id);
		$menus_id= $menuitem->menus_id;
		$menu_items = App\Menusitem::where('menus_id', '=',$menus_id)->get();
		//echo count($menu_items);
		//$all_menus_item_parents=$all_menus_item->how_menu_s($menu->id);
		$check_item_child_s=check_item_child($menu_items,$id); 
		//echo $menus_id;
	//	var_dump($menuitem);
		return view('admin/menusitem/edit')->with('menuitem',$menuitem)->with('menus_id',$menus_id)->with('check_item_child_s',$check_item_child_s);
	}
	public function update(Request $request,$id)
	{
		$menu = App\Menusitem::find($id);
		$id_of_menu=$request->input('id_of_menu');
		$menu->name = $request->input('name_create_menusitem');
		$menu->menus_alias = $request->input('alias_create_menusitem');
		$radio_botton = $request->input('change_s_s');	
		$menuitem = App\Menusitem::find($id);
		$menus_id= $menuitem->menus_id;
		$menu_items = App\Menusitem::where('menus_id', '=',$menus_id)->get();
		if($radio_botton==1){
			$menu->menus_item_url = $request->input('menu_item_url');	
			$menu->cat_id_show = 0;
		}else if($radio_botton==2){
			$menu->menus_item_url ='';
			$menu->cat_id_show = $request->input('cat_id_show');
		} 		
		$check_item_child_s=check_item_child($menu_items,$id); 		
		if(!$check_item_child_s) {
			$menu->menus_item_id_parent=$request->input('menus_item_id'); 
			$menu->update();
			return redirect('admin/menus/link?name='.$id_of_menu);
		}else{
		$menu->update();
		$error="Kiểm tra lại menu cần chỉnh có menu con hay không.";
			return redirect('admin/menus/link?name='.$id_of_menu)->withErrors($error);
		}
	}
	public function destroy($id)
	{

	}
	public function xu_ly_form_menusitem(Request $request) {
		$publish_unpublish=$request->input('publish_unpublish');

		$array_menusitem=$request->input('checkbox');

		
		if($request->input('submit_1')=='Áp dụng') {
			if($publish_unpublish=='hoat_dong') {

					if(count($array_menusitem) >0) {
						foreach($array_menusitem as $menusitem ){
							
							$menusitem = App\Menusitem::find($menusitem);
							$menusitem->status_menusitem = 1;
							$menusitem->save(); 
						}
					}else {
						$error="Không có sản phẩm nào dc chọn";
					}
			}else if($publish_unpublish=='ban_nhap') {
					if(count($array_menusitem) >0) {
						foreach($array_menusitem as $menusitem ){

							$menusitem = App\Menusitem::find($menusitem);
							$menusitem->status_menusitem = 0;
							$menusitem->save(); 
						}
					}else {
						$error="Không có sản phẩm nào dc chọn";
					}
			}else if($publish_unpublish=='xoa_vinh_vien') {

					if(count($array_menusitem) >0) {
						foreach($array_menusitem as $menusitem ){

							$menusitem = App\Menusitem::find($menusitem);
							$menusitem->delete();
						}
					}				
			}
		}
		return redirect()->back();
	}
}

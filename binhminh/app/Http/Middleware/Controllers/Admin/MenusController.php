<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App;
use Illuminate\Http\Request;
//use App\Http\Controllers\Input;
use Illuminate\Support\Facades\Input;
class MenusController extends Controller {

	public function index()
	{
		$menus=App\Menus::all();
		//var_dump($menus);
		return view('admin.menus.index')->with('menus',$menus);
		
	}
	public function create()
	{
		return view('admin.menus.create');
	}

	public function store()
	{
		//
	}

	public function show($id)
	{
		//
	}

	public function edit($id)
	{
		
		//echo Input::get('name');
		//exit();
		$menu = App\Menus::find($id);
	//	echo $id ;
	//	echo "<br/>";
	//	var_dump($menu);
	//	exit();
		return view('admin.menus.edit')->with('menu',$menu);
	}

	public function update(Request $request,$id)
	{
		$menu = App\Menus::find($id);
		
		//$menu->name = $request->input('name');
		echo $menu->content = $request->input('content');
	
		$menu->update();
		return redirect()->back();
	}

	public function destroy($id)
	{
		//
	}
	public function link(){ //hàm này lấy id từ select rồi bắn link sang 

		$id=Input::get('name');
		$menus=App\Menus::all();
		if($id=='0') {
			return redirect('admin/menus');
		}
		$menusitems =App\Menus::find($id)->menusitem;
		//var_dump($menusitems);

		$menu=App\Menus::find($id);
		//echo $menu->name; exit();
		$link='admin/menus/'.$id.'/edit';
		return view('admin.menus.index')->with('menus',$menus)->with('menu',$menu)->with('menusitems',$menusitems);

	}

}

<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
class Menusitem extends Model {

	protected $table = 'menus_item';
	protected $fillable = ['id','menus_id','menus_alias'];
	public $timestamps = true;
	public function admin(){

		return $this->belongsTo('App\Menus');

	}
	public function how_menu_s( $id){ //lay cac item menu thuộc menu là $id

		$menu_item_all_id = Menusitem::where('menus_id', '=', $id)->where('status_menusitem','=',1)->get();
	//	$menu_item_all_id=DB::table('menus_item')->where('menus_id','=',$id)->where('menus_item_id_parent','=',$id_parent)->get();
		return $menu_item_all_id;

	}
	public function how_menu_s_all( $id){ //lay cac item menu thuộc menu là $id
		$menu_item_all_id_all = Menusitem::where('menus_id', '=', $id)->get();
		return $menu_item_all_id_all;

	}	
	public function how_menu_s_parent( $id,$id_parent){ //lay cac item menu thuộc menu là $id

		//$menu_item_all_id = Menusitem::where('menus_id', '=', $id)->get();
		$menu_item_all_id_parent=DB::table('menus_item')->where('menus_id','=',$id)->where('menus_item_id_parent','=',$id_parent)->get();
		return $menu_item_all_id_parent;

	}	
}

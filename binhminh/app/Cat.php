<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Cat extends Model {

	protected $table = 'cat';
	protected $fillable = ['id','cat_alias', 'name','excerpt_cat','content_cat','admin_id', 'parent_id','sort_order','category_avatar','banner_category'];
	public $timestamps = true;
	public function admin(){

		return $this->belongsTo('App\Admin');

	}
    public function product()
    {
        //return $this->belongsToMany('App\Product');
         return $this->hasMany('App\Product');
    }

	public function comment()
	{
		return $this->hasMany('App\comment','idTinTuc','id');
	}
}

<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Catnews extends Model {

	protected $table = 'cat_new';
	protected $fillable = ['id','name', 'cat_new_alias','admin_id', 'parent_id','content','	the_tu_khoa','the_gioi_thieu','status_cat_new','view'];
	public $timestamps = true;
	public function admin(){

		return $this->belongsTo('App\Admin');

	}
    public function news()
    {
         return $this->hasMany('App\News');
    }
}

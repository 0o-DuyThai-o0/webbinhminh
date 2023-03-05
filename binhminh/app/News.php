<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model {

	protected $table = 'news';
	protected $fillable = ['id','name','news_excerpt','new_alias', 'cat_new_id', 'admin_id','content','the_tu_khoa','the_gioi_thieu','status_new','view'];
	public $timestamps = true;
	
	public function admin(){

		return $this->belongsTo('App\Admin');

	}
	
	public function news()
    {
         return $this->belongsTo('App\Catnews');
    }
	
	
}

<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Son extends Model {

	protected $table = 'son';
	protected $fillable = ['id','name'];
	public $timestamps = true;
	/*
	public function admin(){

		return $this->belongsTo('App\Admin');

	}
    public function product()
    {
        //return $this->belongsToMany('App\Product');
         return $this->hasMany('App\Product');
    }
	
	*/
}

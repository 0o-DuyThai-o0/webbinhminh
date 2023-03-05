<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Vitri extends Model {

	protected $table = 'vi_tri_field';
	protected $fillable = ['id','stt'];

	public $timestamps = true;
	public function admin(){

		return $this->belongsTo('App\Admin');

	}
	public function cat()
    {
        //return $this->belongsToMany('App\Cat','cat_id');
         return $this->belongsTo('App\Cat');
    }

}

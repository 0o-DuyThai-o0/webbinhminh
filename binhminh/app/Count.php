<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Count extends Model {

	protected $table = 'counter_values';
	protected $fillable = ['id','day_id','day_value','yesterday_id', 'yesterday_value','week_id','week_value','month_id','month_value','year_value','all_value','record_date','record_value'];

	public $timestamps = true;
	// public function admin(){

	// 	return $this->belongsTo('App\Admin');

	// }
	// public function cat()
 //    {
 //        //return $this->belongsToMany('App\Cat','cat_id');
 //         return $this->belongsTo('App\Cat');
 //    }

}

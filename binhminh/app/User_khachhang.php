<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model {

	protected $table = 'product';
	protected $fillable = ['id','name','attribute','link','don_gia','so_luong','note','image_list'];

	public $timestamps = true;


}

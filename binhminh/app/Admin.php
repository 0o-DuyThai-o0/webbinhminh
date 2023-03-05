<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model {

	protected $table = 'admin';
	protected $fillable = ['id', 'name', 'username','password','status','level'];
	 public $timestamps = true;
    public function cat()
    {
        return $this->hasMany('App\Cat');
    }
    public function product()
    {
        return $this->hasMany('App\product');
    }
    public function news()
    {
        return $this->hasMany('App\News');
    }
}

<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Menus extends Model {

	protected $table = 'menus';
	protected $fillable = ['id','name'];
	public $timestamps = true;
	
	public function menusitem()
    {
        return $this->hasMany('App\Menusitem');
    }

}

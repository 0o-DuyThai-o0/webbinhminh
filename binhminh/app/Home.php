<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Home extends Model {

    protected $table = 'home';
    protected $fillable = ['id', 'name', 'content','home_alias','image_field','id_dinhdang','id_vitri','admin_id','status'];
    public $timestamps = true;
}

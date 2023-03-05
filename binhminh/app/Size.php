<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Dinhdang extends Model {

    protected $table = 'dinh_dang_field';
    protected $fillable = ['id','ten_dinh_dang','mo_ta','admin_id'];
    public $timestamps = true;
}

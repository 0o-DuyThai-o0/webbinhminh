<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Price extends Model {

    protected $table = 'price';
    protected $fillable = ['id','ten_vi_tri', 'admin_id', 'stt','mo_ta'];
    public $timestamps = true;
}

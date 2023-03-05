<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Color extends Model {

    protected $table = 'color';
    protected $fillable = ['id', 'name_color', 'ma_mau'];
    public $timestamps = true;
}

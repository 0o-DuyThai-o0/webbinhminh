<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model {

	protected $table = 'product';
	protected $fillable = ['id','cat_id','admin_id','cat_khoa_chinh', 'name','excerpt','don_hang','ma_san_pham','loai','tieu_chuan','xuat_xu','nhap_khau_va_phan_phoi','content','image_link','image_list','image_lien_quan','tag','view','admin'];

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

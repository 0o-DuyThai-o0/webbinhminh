<?php namespace App\Http\Controllers\Site;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App;
use Illuminate\Http\Request;
use \Illuminate\Support\Facades\DB;
use \Illuminate\Support\Facades\Auth;
class PageController extends Controller {

  public function gioithieu() {
  	$gioi_thieu  = DB::table('product')->where('cat_id', 'LIKE', "%-112-%")->where('status_product','=', '1')->get();   
    return view('site.page.gioi_thieu')->with('gioi_thieu',$gioi_thieu);
  }
  public function huongdan() {
    $gioi_thieu  = DB::table('product')->where('id', '=', "145")->where('status_product','=', '1')->first();   
    return view('site.page.huongdan')->with('huong_dan',$gioi_thieu);
  }
  public function suachua() {
  	$articles_suachua = DB::table('product')->where('id', '=', "42")->where('status_product','=','1')->orderBy('id', 'DESC')->take(1)->get();  
    return view('site.page.suachua')->with('articles_suachua',$articles_suachua);
  }
  public function lienhe() {
  	//$articles_suachua = DB::table('product')->where('id', '=', "42")->where('status_product','=','1')->orderBy('id', 'DESC')->take(1)->get();  
    return view('site.page.lienhe');
  }
  public function baogia(){
     $baogia = DB::table('product')->where('cat_id', 'LIKE', "%-102-%")->where('status_product','=','1')->orderBy('id', 'DESC')->take(1)->get();  
     return view('site.page.baogia')->with('baogia',$baogia);
  }
    public function thuvien(){
     $thuvien = DB::table('product')->where('cat_id', 'LIKE', "%-502-%")->where('status_product','=','1')->orderBy('id', 'DESC')->take(9)->get();  
     return view('site.page.thuvien')->with('thuvien',$thuvien);
  }

  
}
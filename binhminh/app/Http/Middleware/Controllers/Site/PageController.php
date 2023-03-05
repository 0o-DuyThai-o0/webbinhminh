<?php namespace App\Http\Controllers\Site;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App;
use Illuminate\Http\Request;
use \Illuminate\Support\Facades\DB;
class PageController extends Controller {

  public function lap_dat_camera() {
  	$lap_dat_camera  = DB::table('cat')->where('id', '=', "54")->get();  
  	$list_articles_camera = DB::table('product')->where('cat_id', '=', "54")->where('status_product','=','1')->orderBy('id', 'DESC')->take(30)->get();  
    return view('site.page.lap_dat_camera')->with('lap_dat_camera',$lap_dat_camera)->with('list_articles_camera',$list_articles_camera);
  }
  public function suachua() {
  	$articles_suachua = DB::table('product')->where('id', '=', "42")->where('status_product','=','1')->orderBy('id', 'DESC')->take(1)->get();  
    return view('site.page.suachua')->with('articles_suachua',$articles_suachua);
  }
  public function lienhe() {
  	//$articles_suachua = DB::table('product')->where('id', '=', "42")->where('status_product','=','1')->orderBy('id', 'DESC')->take(1)->get();  
    return view('site.page.lienhe');
  }
  public function demo(){
     return view('site.page.sendmail');
  }

  
}
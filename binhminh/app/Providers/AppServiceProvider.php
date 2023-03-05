<?php namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use DB;

class AppServiceProvider extends ServiceProvider {

	/**
	 * Bootstrap any application services.
	 *
	 * @return void
	 */
	public function boot()
	{
        

    $bat_ca_shbet=DB::table('product')->where('cat_id', 'LIKE', "%-582-%")->where('status_product','=',1 )->take(20)->get();
	
    //   $son="1";
		$menu_top = DB::table('menus')->where('id', '=', "1")->get();
		$menu_inde_footer = DB::table('menus')->where('id', '=', "4")->get();
		$menu_sitebar = DB::table('menus')->where('id', '=', "3")->get();
        $menu_left=DB::table('product')->where('cat_id', 'LIKE', "%-582-%")->where('status_product','=',1 )->take(20)->orderBy('id','DESC')->get();
        $menu_top_2 = DB::table('menus')->where('id', '=', "2")->get();
        $menu_footer_1 = DB::table('menus')->where('id', '=', "3")->get();
        $menu_footer_2 = DB::table('menus')->where('id', '=', "4")->get();
        $menu_mobile = DB::table('menus')->where('id', '=', "5")->get();

		$menu_header = DB::table('menus')->where('id', '=', "2")->get();
        $menu_mobile_left = DB::table('menus')->where('id', '=', "5")->get();
        $all_field_home = DB::table('home')->get();
        $chirlden_home = DB::table('cat')->where('parent_id',312)->get();
        $pages = DB::table('cat')->where('parent_id',319)->get();
        $hotdeal = DB::table('product')->where('cat_id','LIKE','%-582-%')->where('status_product',1)->get();
        $all_cat = DB::table('cat')->get();
        $list_category  = DB::table('cat')->get();
        $list_category_hot = DB::table('product')->where('status_product',1)->take(4)->get();
        
        // foreach ($menu_header as $value) {
        //   $jsons=json_decode($value->content,1);                             
        // }
       
        $menu_tag = DB::table('menus')->where('id', '=', "4")->get();
        $product_tag =  DB::table('product')->where('status_product',1)->get();
        $tin_tuc=DB::table('product')->where('cat_id', 'LIKE', "%-582-%")->where('status_product','=',1 )->take(3)->orderBy(DB::raw('RAND()'))->get();

        
        

        //count($list_articles_cat);
        View::share('all_field_home', $all_field_home);
		
		View::share('menu_inde_footer', $menu_inde_footer);
		View::share('menu_sitebar', $menu_sitebar);
		View::share('bat_ca_shbet', $bat_ca_shbet);
		
		
        View::share('menu_top', $menu_top);
        View::share('menu_top_2', $menu_top_2);
        View::share('menu_header', $menu_header);
        View::share('menu_footer_1', $menu_footer_1);
        View::share('menu_footer_2', $menu_footer_2);
        View::share('menu_mobile', $menu_mobile);
        View::share('menu_mobile_left', $menu_mobile_left);
        View::share('chirlden_home', $chirlden_home);
        View::share('pages', $pages);
        View::share('hotdeal', $hotdeal);
        View::share('all_cat', $all_cat);
        // View::share('jsons', $jsons);
     
        View::share('product_tag', $product_tag);
        View::share('menu_left', $menu_left);
        View::share('list_category', $list_category);
        View::share('list_category_hot', $list_category_hot);
        View::share('menu_tag', $menu_tag);
        
        View::share('tin_tuc', $tin_tuc);

	}

	/**
	 * Register any application services.
	 *
	 * This service provider is a great spot to register your various container
	 * bindings with the application. As you can see, we are registering our
	 * "Registrar" implementation here. You can add your own bindings too!
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app->bind(
			'Illuminate\Contracts\Auth\Registrar',
			'App\Services\Registrar'
		);
	}

}

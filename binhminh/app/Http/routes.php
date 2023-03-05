<?php
use Illuminate\Pagination\Paginator;
use App\Http\Requests;
use Illuminate\Support\Facades\Route;

//Route::get('/','Site\SanphamController@index_mobile');

Route::get('/','Site\SanphamController@index');

//Route::get('tim-san-pham/{search_site?}/{danhmuc?}', 'Site\SanphamController@postdata');
//Route::post('tim-san-pham/{search_site?}/{danhmuc?}', 'Site\SanphamController@getdata');

Route::get('tim-san-pham/{search_site}', 'Site\SanphamController@postdata');
Route::post('tim-san-pham/{search_site}', 'Site\SanphamController@getdata');


Route::post('/muahang','Site\MailController@muahang');
Route::get('pay-pal','Site\SanphamController@get_pay_pal');
Route::post('pay-pal','Site\SanphamController@post_pay_pal');
///Send Mail 
Route::get('sing-up','Site\SanphamController@singup');
Route::post('sing-up','Site\SanphamController@singup');
Route::get('test',function (){
     return view('site.test');
});
Route::post('test-js-tt','Site\SanphamController@them_anh_ajax_tt');
Route::post('xoa-anh-ajax-tt','Site\SanphamController@xoa_anh_ajax_post_tt');
Route::post('test-js-tt-slider','Site\SanphamController@them_anh_ajax_tt_slider');
Route::post('xoa-anh-ajax-tt-slider','Site\SanphamController@xoa_anh_ajax_post_tt_slider');
Route::post('test-js-tt-edit-product','Site\SanphamController@them_anh_ajax_tt_edit_product');
Route::post('xoa-anh-ajax-tt-edit-product','Site\SanphamController@xoa_anh_ajax_post_tt_edit_product');
Route::post('test-js-tt-edit-product-slider','Site\SanphamController@them_anh_ajax_tt_edit_product_slider');
Route::post('xoa-anh-ajax-tt-edit-product-slider','Site\SanphamController@xoa_anh_ajax_post_tt_edit_product_slider');
Route::post('test-js-tt-cat','Site\SanphamController@them_anh_ajax_tt_cat_create');
Route::post('xoa-anh-ajax-tt-cat','Site\SanphamController@xoa_anh_ajax_post_tt_cat_create');
Route::post('test-js-tt-cat-danh-muc','Site\SanphamController@them_anh_ajax_tt_cat_create_danh_muc');
Route::post('xoa-anh-ajax-tt-cat-danh-muc','Site\SanphamController@xoa_anh_ajax_post_tt_cat_create_danh_muc');
Route::post('test-js-tt-edit-cat-avt','Site\SanphamController@them_anh_ajax_tt_cat_edit_avt');
Route::post('xoa-anh-ajax-tt-edit-cat-avt','Site\SanphamController@xoa_anh_ajax_post_tt_cat_edit_avt');
Route::post('test-js-tt-edit-cat-banner','Site\SanphamController@them_anh_ajax_tt_cat_edit_banner');
Route::post('xoa-anh-ajax-tt-edit-cat-banner','Site\SanphamController@xoa_anh_ajax_post_tt_cat_edit_banner');
Route::post('test-js-tt-news','Site\SanphamController@them_anh_ajax_tt_news');
Route::post('xoa-anh-ajax-tt-news','Site\SanphamController@xoa_anh_ajax_news');
Route::post('test-js-tt-edit-news','Site\SanphamController@them_anh_ajax_tt_news_edit');
Route::post('xoa-anh-ajax-tt-edit-news','Site\SanphamController@xoa_anh_ajax_news_edit');

Route::get('get-fillter','Site\SanphamController@test1');
Route::post('get-fillter','Site\SanphamController@test2');

Route::get('cart-don-hang', 'Site\SanphamController@get_cart_don_hang');
Route::get('/thu-vien', 'Site\PageController@thuvien');
//Route::post('cart-don-hang', 'Site\SanphamController@post_cart_don_hang');

Route::post('cart-don-hang', 'Site\SanphamController@post_cart_don_hang');
Route::post('thong_tin_khach_hang', 'Site\SanphamController@post_thong_tin_khach_hang');
Route::get('admin/login', function(){
    return view('admin.login');
});
Route::post('admin/login', 'Admin\AdminController@login');
Route::get('admin/logout','Admin\AdminController@logout');
if(isset($_SESSION['level'])){
    if($_SESSION['level'] != 0){
        Route::group(['prefix' => 'admin','middleware' => 'admin'], function()
{
         Route::get('/', function(){
                return view('admin.index');
            });
         Route::resource('product', 'Admin\ProductController');
          Route::get('product/search/{s_search?}','Admin\ProductController@get_s_search');
    Route::post('product/search/{s_search?}','Admin\ProductController@s_search');
    Route::get('product/loc-san-pham/{tac_gia}/{cat_id?}', 'Admin\ProductController@loc_san_pham');
    Route::post('product/loc-san-pham', 'Admin\ProductController@delete_s_code');
    Route::get('product/all-va-ban-nhap/{all_va_bannhap?}','Admin\ProductController@get_all_va_bannhap');
          });
    }else {

Route::group(['prefix' => 'admin','middleware' => 'admin'], function()
{
    Route::get('/', function(){
        return view('admin.index');
    });
    Route::get('/menus/link','Admin\MenusController@link');
    Route::resource('admin', 'Admin\AdminController');
    Route::resource('home', 'Admin\HomeController');
    Route::resource('vi_tri_field', 'Admin\PriceController');
    Route::resource('color', 'Admin\ColorController');
    Route::resource('dinh_dang_field', 'Admin\SizeController');
    Route::resource('cat', 'Admin\CatController');
    Route::resource('product', 'Admin\ProductController');
    Route::resource('menus', 'Admin\MenusController');
    Route::resource('menusitem', 'Admin\MenusitemController');
    Route::resource('son', 'Admin\SonController');
    Route::get('news','Admin\NewsController@index');
    Route::get('comment','Admin\CommentAdController@comment');
    Route::get('reply_comment','Admin\ReplyCommentController@reply_comment');

    Route::get('news/create','Admin\NewsController@create');
    Route::post('news/create','Admin\NewsController@store');
    Route::get('news/{id}/edit','Admin\NewsController@edit');
    Route::post('news/{id}/edit','Admin\NewsController@update');

    Route::get('news/search/{s_search?}','Admin\NewsController@get_s_search');
    Route::post('news/search/{s_search?}','Admin\NewsController@s_search');
    Route::get('news/all-va-ban-nhap/{all_va_bannhap?}','Admin\NewsController@get_all_va_bannhap');
    Route::post('news/loc-san-pham', 'Admin\NewsController@xu_ly');
    Route::get('news/loc-san-pham/{tac_gia}/{cat_id?}', 'Admin\NewsController@loc_san_pham');

    Route::get('cat-new/','Admin\CatnewsController@index');

    //Route::get('/home/{id}', ['as' => 'deteleHome','uses' => 'Admin\HomeController@destroy']);
    Route::get('comment/delete/{id_cm}','Admin\CommentAdController@getdelete');
    Route::get('reply_comment/delete/{id_reply}','Admin\ReplyCommentController@getdeleterp');
   
    Route::get('dinh_dang_field/{id}', [ 'as' => 'DeteleSize', 'uses' => 'Admin\SizeController@destroy' ] );
    Route::get('vi_tri_field/{id}', [ 'as' => 'DetelePrice', 'uses' => 'Admin\PriceController@destroy' ] );
    Route::get('attribute_product/att_product/{id}', [ 'as' => 'Deteleatt', 'uses' => 'Admin\AttproductController@destroy' ] );
     Route::post('home/xoa_field', 'Admin\HomeController@xoa_field');
    //Route::delete('home/{id}', 'Admin\HomeController@destroy')->name('home.destroy');;
    Route::get('cat-new/create','Admin\CatnewsController@create');
    Route::post('cat-new/create','Admin\CatnewsController@store');
    Route::get('cat-new/{id}/edit','Admin\CatnewsController@edit');
    Route::post('cat-new/{id}/edit','Admin\CatnewsController@update');
     Route::post('/catnews/chinh-sua','Admin\CatnewsController@xu_ly_form_catnew');

    Route::get('product/loc-san-pham/{tac_gia}/{cat_id?}', 'Admin\ProductController@loc_san_pham');
    Route::post('product/loc-san-pham', 'Admin\ProductController@delete_s_code');
    Route::post('filter/loc-san-pham', 'Admin\PriceController@delete_s_code');
    //Route::resource('media', 'Admin\MediaController');
    Route::post('cat/search/{search?}','Admin\CatController@s_search');
    Route::get('cat/search/{search?}','Admin\CatController@get_s_search');
    Route::get('cat/all-va-ban-nhap/{all_va_bannhap?}','Admin\CatController@get_all_va_bannhap');
    Route::post('/cat/chinh-sua','Admin\CatController@xu_ly_form_cat');

    Route::get('upload',function(){
        return view('upload');
    });
    Route::post('upload','Admin\AdminController@upload');

    Route::post('upload-edit/{id?}','Admin\ProductController@upload_edit');

    Route::post('media/delete_image/{all_file_1?}','Admin\MediaController@delete_image');
    Route::get('media/{name?}/{name1?}/{name2?}','Admin\MediaController@get_view_folder');
    Route::post('media/{name?}/{name1?}/{name2?}','Admin\MediaController@view_folder');

    Route::post('/menusitem/chinh-sua','Admin\MenusitemController@xu_ly_form_menusitem');

    Route::get('product/search/{s_search?}','Admin\ProductController@get_s_search');
    Route::post('product/search/{s_search?}','Admin\ProductController@s_search');

    Route::get('product/all-va-ban-nhap/{all_va_bannhap?}','Admin\ProductController@get_all_va_bannhap');

    Route::post('xoa-session-images/{name?}','Admin\AdminController@xoa_session_images');

    Route::post('xoa-session-edit-images/{id?}/{name?}','Admin\ProductController@xoa_session_edit_images');
    Route::post('them-anh-dai-dien/{id?}','Admin\ProductController@them_anh_dai_dien');
    Route::post('them-anh-dai-dien-cat-avatar/{id?}','Admin\CatController@them_anh_dai_dien_cat_avatar');
    Route::post('them-anh-slider/{id?}','Admin\ProductController@them_anh_slider');
    Route::post('xoa-anh-field-home-create/{id?}','Admin\HomeController@xoa_anh_field_home_create');
    Route::post('them-anh-field-home/{id?}','Admin\HomeController@them_anh_field_home');

    Route::post('them-anh-dai-dien-cat-danh-muc/{id?}','Admin\CatController@them_anh_dai_dien_cat_danh_muc');

    Route::post('xoa-anh-dai-dien/{id?}/{number?}','Admin\ProductController@xoa_anh_dai_dien');
    Route::post('xoa-anh-dai-dien-cat-avatar/{id?}/{number?}','Admin\CatController@xoa_anh_dai_dien_cat_avatar');
    Route::post('xoa-anh-slider-product/{id?}/{number?}','Admin\ProductController@xoa_anh_slider');
    Route::post('xoa-anh-dai-dien-cat-danh-muc/{id?}/{number?}','Admin\CatController@xoa_anh_dai_dien_cat_danh_muc');
    Route::post('them-anh-dai-dien-create','Admin\ProductController@them_anh_dai_dien_create');
    Route::post('them-anh-field-create','Admin\HomeController@them_anh_field_create');
    Route::post('xoa_anh_field_home_edit/{id?}/{number?}','Admin\HomeController@xoa_anh_field_home_edit');
    Route::post('them-anh-dai-dien-cat-create','Admin\CatController@them_anh_dai_dien_cat_create');

    Route::post('them-anh-dai-dien-cat-avatar-create','Admin\CatController@them_anh_dai_dien_cat_avatar_create');
    Route::post('them-anh-slider-product','Admin\ProductController@them_anh_slider_product');

    Route::post('xoa-anh-dai-dien-create/{id?}','Admin\ProductController@xoa_anh_dai_dien_create');

    Route::post('xoa-anh-slider-product-create/{id?}','Admin\ProductController@xoa_anh_slider_product');

    Route::post('xoa-anh-dai-dien-cat-create/{id?}','Admin\CatController@xoa_anh_dai_dien_cat_create');

    Route::post('xoa-anh-dai-dien-cat-avatar-create/{id?}','Admin\CatController@xoa_anh_dai_dien_cat_avatar_create');
    //Route::get('/addcart', 'Site\SanphamController@Ajaxcat_get');
    Route::get('cart', 'Site\SanphamController@getCart');
    Route::post('cart', 'Site\SanphamController@getCartpost');
   

    Route::post('them-anh-dai-dien-create-new','Admin\NewsController@them_anh_dai_dien_create_new');

    Route::post('them-anh-dai-dien-new/{id?}','Admin\NewsController@them_anh_dai_dien_new');
    Route::post('xoa-anh-dai-dien-create-new/{id?}','Admin\NewsController@xoa_anh_dai_dien_create_new');

    Route::post('xoa-anh-dai-dien-new/{id?}/{number?}','Admin\NewsController@xoa_anh_dai_dien_new');
    Route::get('edit-footer','Admin\AdminController@getfileindexfooter');
    Route::post('edit-footer','Admin\AdminController@edit_file_index_footer');

    Route::get('edit-lien-he','Admin\AdminController@getfileindexlienhe');
    Route::post('edit-lien-he','Admin\AdminController@edit_file_index_lienhe');




});
    }
}


// Route::post('tim-sim/{search_site?}/{nha_mang?}/{khoang_gia?}/{sap_xep?}','Site\SanphamController@search_site');

// Route::get('loc-sim/{search_site?}/{nha_mang?}/{khoang_gia?}/{sap_xep?}', 'Site\SanphamController@get_loc_sim');
// Route::post('loc-sim/{search_site?}/{nha_mang?}/{khoang_gia?}/{sap_xep?}','Site\SanphamController@post_loc_sim');


//filter price product 
Route::get('filter-san-pham/{min_price?}/{max_price?}/{cat_id?}', 'Site\SanphamController@postdata_filter');
Route::post('filter-san-pham/{min_price?}/{max_price?}/{cat_id?}', 'Site\SanphamController@getdata_filter');






Route::get('don-hang', 'Site\SanphamController@get_session_don_hang');
Route::post('don-hang', 'Site\SanphamController@post_session_don_hang');
Route::get('cart', 'Site\SanphamController@cart_show_product');

Route::get('cart-xoa-tam/{id?}', 'Site\SanphamController@cart_huy_product');
Route::post('cart-xoa-tam/{id?}', 'Site\SanphamController@cart_post_huy_product');
Route::get('cart-xoa-all}', 'Site\SanphamController@get_cart_xoa_all');
Route::post('cart-xoa-all}', 'Site\SanphamController@post_cart_xoa_all');



Route::post('update-quantity', 'Site\SanphamController@update_quantity');
Route::post('them_anh_danh_muc','Admin\CatController@them_anh_danh_muc');



Route::get('{cat_alias?}',function($cat_alias=null){ //chú ý đây là hàm-viết- duong dẫn của danh mục và bài viết

    $cat=DB::table('cat')->where('cat_alias','=',$cat_alias)->first();
    //	var_dump($cat);

    if(count($cat)) {

        $cat=App\Cat::find($cat->id);
        $title=$cat->name;
        $product_all = DB::table('product')->where('status_product','=','1')->get();
        $cats=App\Cat::all();
        $array_list=get_list_cat_chilrent($cats,$cat->id); //get danh sach cat  và cat chil
        //array_push($stack, "apple", "raspberry");



        $cat_parent_breadcrumb=DB::table('cat')->where('id', '=',$cat->parent_id)->first();
        // var_dump($cat->id);
        // echo $cat->id;
        $products=DB::table('product')->whereIn('cat_id',$array_list)->orderBy('id', 'DESC')->where('status_product','=','1')->orWhere(function($query)use ($array_list)
        {
            $query->whereIn('cat_id_1',$array_list);
            // ->whereIn('cat_id_2',$array_list);
        })
            ->orWhere(function($query)use ($array_list)
            {
                $query->whereIn('cat_id_2',$array_list);

            })
            ->paginate(so_san_pham_hien_thi_index_cat);


        $list_articles_cat_all = DB::table('product')->where('cat_id', 'LIKE', "%-".$cat->id."-%")->where('status_product','=',1)->orderBy('id', 'DESC')->get();
        $list_articles_cat = DB::table('product')->where('cat_id', 'LIKE', "%-".$cat->id."-%")->orderBy('id', 'ASC')->where('status_product','=','1')->get();

      
        //var_dump ($list_articles_cat);

        $count_productc_category = count($list_articles_cat_all);
       

        $min_price_old = DB::table('product')->where('cat_id', 'LIKE', "%-".$cat->id."-%")->where('status_product','=','1')->selectRaw('min(price_old) as price')->first();
        $max_price_old = DB::table('product')->where('cat_id', 'LIKE', "%-".$cat->id."-%")->where('status_product','=','1')->selectRaw('max(price_old) as price')->first();
        $min_price_new = DB::table('product')->where('cat_id', 'LIKE', "%-".$cat->id."-%")->where('status_product','=','1')->selectRaw('min(price) as price')->first();
        $max_price_new = DB::table('product')->where('cat_id', 'LIKE', "%-".$cat->id."-%")->where('status_product','=','1')->selectRaw('max(price) as price')->first();
		
        return view('site.cat')->with('cat',$cat)->with('products',$products)->with('cat_parent_breadcrumb',$cat_parent_breadcrumb)->
        with('title',$title)->with('list_articles_cat',$list_articles_cat)->with('min_price_old',$min_price_old)->with('max_price_old',$max_price_old)->with('count_prodcut_cat',$count_productc_category)->with('cats',$cats)->with('product_all',$product_all)->with('min_price_new',$min_price_new)->with('max_price_new',$max_price_new);



    }
    else {
        $product=DB::table('product')->where('product_alias','=',$cat_alias)->first();

        if($product){

            $product=App\Product::find($product->id);
            $title=$product->name;

            $cat=App\Cat::find($product->cat_id);
            $cats=App\Cat::all();
            //$cat_parent_breadcrumb=DB::table('cat')->where('id', '=',$cat->parent_id)->first();

            //$san_pham_lien_quan=DB::table('product')->where('cat_id','LIKE',"%-".$product->cat_id)->where('id','!=',$product->id)->where('status_product','=','1')->orderBy('id', 'DESC')->take(6)->get();

            $lien_quans=explode('-', $product->cat_id);

            $cat=App\Cat::find($lien_quans[1]);


            //exit();
            //$cat=App\Cat::find('-'.$product->cat_id.'-');

            $san_pham_lien_quan=DB::table('product')


                ->where(function($query)use ($lien_quans)
                {
                  
                    
                  
                        //  echo $value=(string)$value;
                        $query->where('cat_id','LIKE',"%-$lien_quans[1]-%");
                  
                    //echo $ct_lq;

                })


                ->where('id','!=',$product->id)->where('status_product','=','1')->orderBy('id', 'DESC')->take(4)->get();

         //var_dump($san_pham_lien_quan);

            return view('site.single')->with('product',$product)->with('title',$title)->with('san_pham_lien_quan',$san_pham_lien_quan)->with('cat',$cat)->with('cats',$cats);


        }
        else {
            $active=1;
            $new=DB::table('news')->where('new_alias','=',$cat_alias)->first();
            if($new) {

                $new=App\News::find($new->id);
                $title=$new->name;
                //echo $title;
                $cat_new=App\Catnews::find($new->cat_new_id);
                $list_new_lq=DB::table('news')->where('id','!=',$new->id)->take(4)->orderBy('id', 'DESC')->get();
                return view('site.new')->with('new',$new)->with('active',$active)->with('cat_new',$cat_new)->with('title',$title)->with('list_new_lq',$list_new_lq);
            }else {

                $cat_new=DB::table('cat_new')->where('cat_new_alias','=',$cat_alias)->first();

                if(count($cat_new)) {

                    $cat_new=App\Catnews::find($cat_new->id);
                    $title=$cat_new->name;


                    $news=DB::table('news')
                        ->where('cat_new_id','=',$cat_new->id)->orderBy('id', 'ASC')
                        ->paginate(so_san_pham_hien_thi_index_cat) ;
                    //var_dump($news);
                    $list_new=DB::table('news')->where('cat_new_id','=',"5")->take(15)->orderBy('id', 'DESC')->get();
                    // $san_pham_lien_quan=DB::table('news')->where('id','=',$new->id)->where('id','!=',$new->id)->where('status_new','=','0')->orderBy('id', 'DESC')->take(6)->get();
                    // var_dump($san_pham_lien_quan);die();
                    return view('site.cat_new')->with('cat_new',$cat_new)->with('news',$news)->with('title',$title)->with('list_new',$list_new);

                }else{
                    return view('site.404');
                }
            }

        }

    }


});
Route::get('price-select', function($name = null){
    
    
    
});
Route::post('price-select','Site\SanphamController@price_select');
Route::get('{cat_alias_loc}/{cat_id}/{id_loc?}','Site\SanphamController@orderby_cat');
Route::post('{cat_alias_loc}/{cat_id}/{id_loc?}','Site\SanphamController@orderby_cat_get');

//Comment systerm
Route::post('/comments','Site\CommentController@store');
Route::get('binhminh/comment/delete/{id_cm}','Site\CommentController@getdelete');

Route::post('/reply_comment','Site\ReplyCommentController@storerp');
Route::get('binhminh/reply_comment/delete/{id_reply}','Site\ReplyCommentController@getdeleterp');


Route::post('tim-kiem/search/{search?}','Site\SanphamController@form__input_search');
Route::get('tim-kiem/search/{search?}','Site\SanphamController@get_form__input_search');
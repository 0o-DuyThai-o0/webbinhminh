	<?php
	use Illuminate\Pagination\Paginator;

	Route::get('/','Site\SanphamController@index');
	
	Route::get('admin/login', function(){
		return view('admin.login'); 
	});
	Route::post('admin/login', 'Admin\AdminController@login');
	Route::get('admin/logout','Admin\AdminController@logout');
 
	Route::get('them-vao-bang',function(){
		Schema::table('product', function($table)
			{
			//	$table->integer('status_cat')->after('parent_id');
				
			//	$table->dropColumn('tu-khoa');
				//$table->string('menus_item_url')->after('menus_alias');
				//$table->integer('cat_id_show')->after('menus_id');  
			//	$table->longText('the_tu_khoa')->after('content');
			//	$table->integer('ban_chay')->after('view'); 
			//$table->longText('ma_san_pham')->after('price');
			//$table->integer('cat_id_2')->after('cat_id_1'); 
				/*
				$table->longText('name');
				$table->longText('cat_new_alias');
				$table->integer('admin_id');
				$table->integer('parent_id');
				$table->longText('content');
				
				$table->longText('the_tu_khoa');
				$table->longText('the_gioi_thieu');
				$table->integer('status_product');
				$table->integer('view');
				$table->timestamps();
				*/
			}); 
		});
	Route::group(['prefix' => 'admin','middleware' => 'admin'], function()
	{
	    //	echo Session::get('admin');
		//	exit();
		Route::get('/', function(){
			return view('admin.index');
		});
		Route::get('menus/link','Admin\MenusController@link');
	    Route::resource('admin', 'Admin\AdminController');
	    Route::resource('cat', 'Admin\CatController');
	    Route::resource('product', 'Admin\ProductController');
	    Route::resource('menus', 'Admin\MenusController');
	    Route::resource('menusitem', 'Admin\MenusitemController');

		Route::get('news','Admin\NewsController@index');
		
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
		Route::get('cat-new/create','Admin\CatnewsController@create');
		Route::post('cat-new/create','Admin\CatnewsController@store');
		Route::get('cat-new/{id}/edit','Admin\CatnewsController@edit');
		Route::post('cat-new/{id}/edit','Admin\CatnewsController@update');
		
		Route::get('product/loc-san-pham/{tac_gia}/{cat_id?}', 'Admin\ProductController@loc_san_pham');
		Route::post('product/loc-san-pham', 'Admin\ProductController@delete_s_code');
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
		Route::post('xoa-anh-dai-dien/{id?}/{number?}','Admin\ProductController@xoa_anh_dai_dien');
		
		Route::post('them-anh-dai-dien-create','Admin\ProductController@them_anh_dai_dien_create');
		

		Route::post('xoa-anh-dai-dien-create/{id?}','Admin\ProductController@xoa_anh_dai_dien_create');
		
		Route::get('edit-footer','Admin\AdminController@getfileindexfooter');
		Route::post('edit-footer','Admin\AdminController@edit_file_index_footer');

		Route::get('edit-lien-he','Admin\AdminController@getfileindexlienhe');
		Route::post('edit-lien-he','Admin\AdminController@edit_file_index_lienhe');
	});

		Route::get('themvao','Admin\ProductController@themvao');

	    Route::get('text-json/{name?}', function($name=null)
		{
		//    echo $name;
		//	exit("==========kaka==========");
			$array = array(
				"name" => "Nguyễn Văn Cường",
				"email" => "TheHalfHeart@gmail.com",
				"website" => "freetuts.net" 
			);
			 
		//	echo json_encode($array);
			
			$kaka='[
						{
							"name" : "http://xuongkhop.net/public/images/home/iframe1.png",
							"desc" : "mô tả hình ảnh",
							"url"  : "đường dẫn hình ảnh",
							"is_avatar" : "có phải hình đại diện hay không"
						},
						{
							"name" : "http://xuongkhop.net/public/images/home/iframe2.png",
							"desc" : "mô tả hình ảnh",
							"url"  : "đường dẫn hình ảnh",
							"is_avatar" : "có phải hình đại diện hay không"
						},
						{
							"name" : "http://xuongkhop.net/public/images/home/iframe3.png",
							"desc" : "mô tả hình ảnh",
							"url"  : "đường dẫn hình ảnh",
							"is_avatar" : "có phải hình đại diện hay không"
						}						
					]';
				//	echo $kaka.'<br>';
					$iii=json_decode($kaka,1);
					var_dump($iii);
			//		echo json_encode($iii);
		});
		
	Route::get('san-pham/tim-kiem/{search_site?}', 'Site\SanphamController@get_search_site');
	Route::post('san-pham/tim-kiem/{search_site?}','Site\SanphamController@search_site');
	Route::get('san-pham-phuong-trang',function(){

		//$cat=0;
		$title="Sản phẩm vật tư Phương Trang";
		
		$cat_parent_breadcrumb=0;
		$products=DB::table('product')->orderBy('id', 'DESC')->where('status_product','=','1')->paginate(so_san_pham_hien_thi_index_cat) ;
		return view('site.all-product')->with('products',$products)->with('cat_parent_breadcrumb',$cat_parent_breadcrumb)->with('title',$title);	
		
	});


	Route::get('{cat_alias?}',function($cat_alias=null){ //chú ý đây là hàm-viết- duong dẫn của danh mục và bài viết
	
			$cat=DB::table('cat')->where('cat_alias','=',$cat_alias)->first();
			
			if(count($cat)) {
				$cat=App\Cat::find($cat->id);
				$title=$cat->name;
				$cats=App\Cat::all();
				$array_list=get_list_cat_chilrent($cats,$cat->id); //get danh sach cat  và cat chil
				//array_push($stack, "apple", "raspberry");

				$cat_parent_breadcrumb=DB::table('cat')->where('id', '=',$cat->parent_id)->first();

			//	$products=DB::table('product')->whereIn('cat_id',$array_list)->orWhere('cat_id_1',$cat->id)->orWhere('cat_id_2',$cat->id)->orderBy('id', 'DESC')->where('status_product','=','1')->paginate(so_san_pham_hien_thi_index_cat) ;
			
			$products=DB::table('product')->whereIn('cat_id',$array_list)
			->orWhere(function($query)use ($array_list)
				{
					 $query->whereIn('cat_id_1',$array_list);
					// ->whereIn('cat_id_2',$array_list);
				})
			->orWhere(function($query)use ($array_list)
				{
					 $query->whereIn('cat_id_2',$array_list);
					
				})
			//->orWhere('cat_id_2',$cat->id)
			->orderBy('id', 'DESC')->where('status_product','=','1')
			->paginate(so_san_pham_hien_thi_index_cat) ;
			
			
				//$products=DB::table('product')->where('cat_id','=',$cat->id)->orderBy('id', 'DESC')->where('status_product','=','1')->paginate(so_san_pham_hien_thi_index_cat) ; son remove
				return view('site.cat')->with('cat',$cat)->with('products',$products)->with('cat_parent_breadcrumb',$cat_parent_breadcrumb)->with('title',$title);
			}
			else {
				$product=DB::table('product')->where('product_alias','=',$cat_alias)->first();
			//	return var_dump($product);
				if($product){
					
					$product=App\Product::find($product->id);
					$title=$product->name;
					$cat=App\Cat::find($product->cat_id);
					$cat_parent_breadcrumb=DB::table('cat')->where('id', '=',$cat->parent_id)->first();
				//	echo count($cat_parent_breadcrumb);
				//	var_dump($cat_parent_breadcrumb->name);
				//	exit();
					$san_pham_ban_chay=DB::table('product')->where('ban_chay', '=', "1")->where('status_product','=','1')->take(5)->orderBy('id', 'DESC')->get();
					$san_pham_ban_chay_1=DB::table('product')->where('ban_chay', '=', "1")->where('status_product','=','1')->skip(5)->orderBy('id', 'DESC')->take(5)->get();

					$san_pham_lien_quan=DB::table('product')->where('cat_id','=',$product->cat_id)->where('id','!=',$product->id)->where('status_product','=','1')->orderBy('id', 'DESC')->take(10)->get();
					
					//var_dump(count($san_pham_lien_quan));
							return view('site.single')->with('product',$product)->with('title',$title)->with('san_pham_ban_chay',$san_pham_ban_chay)->with('san_pham_ban_chay_1',$san_pham_ban_chay_1)->with('san_pham_lien_quan',$san_pham_lien_quan)->with('cat',$cat)->with('cat_parent_breadcrumb',$cat_parent_breadcrumb);
				}
				else {
					$active=1;
					$new=DB::table('news')->where('new_alias','=',$cat_alias)->first();
					if($new) { 
						return view('site.new')->with('new',$new)->with('active',$active);
					}else {
						return view('site.404');
					}
					
				}
			}

	});



<?php


		Route::get('kaka',function(){
			return view('test.index');
		});
		Route::post('kaka',function(){
			
			return "vào tới đây rồi";
		});

	Route::get('admin/login', function(){
		return view('admin.login');
	});
	Route::post('admin/login', 'Admin\AdminController@login');
	Route::get('admin/logout','Admin\AdminController@logout');

Route::group(['prefix' => 'admin','middleware' => 'admin'], function()
{

	Route::resource('admin', 'Admin\AdminController');
});
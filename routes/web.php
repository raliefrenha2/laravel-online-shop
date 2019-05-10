<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Auth::routes();

Route::group(['middleware' => 'auth'], function(){
	Route::prefix('admin')->group(function() {

		Route::get('/', 'Admin\DashboardController@index')->name('dashboard.index');

		Route::prefix('category')->group(function(){
			Route::name('category.')->group(function(){
				Route::post('/', 'Admin\CategoryController@store')->name('store');
				Route::get('/', 'Admin\CategoryController@index')->name('index');
				Route::get('/create', 'Admin\CategoryController@create')->name('create');
				Route::delete('/{model}', 'Admin\CategoryController@destroy')->name('destroy');
				Route::put('/{model}', 'Admin\CategoryController@update')->name('update');
				Route::get('/{model}', 'Admin\CategoryController@show')->name('show');
				Route::get('/{model}/edit', 'Admin\CategoryController@edit')->name('edit');
			});
		});
		
		Route::name('tag.')->group(function(){
			Route::post('tag', 'Admin\TagController@store')->name('store');
			Route::get('tag', 'Admin\TagController@index')->name('index');
			Route::get('tag/create', 'Admin\TagController@create')->name('create');
			Route::delete('tag/{model}', 'Admin\TagController@destroy')->name('destroy');
			Route::put('tag/{model}', 'Admin\TagController@update')->name('update');
			Route::get('tag/{model}', 'Admin\TagController@show')->name('show');
			Route::get('tag/{model}/edit', 'Admin\TagController@edit')->name('edit');
		});

		Route::name('product.')->group(function(){
			Route::post('product', 'Admin\ProductController@store')->name('store');
			Route::get('product', 'Admin\ProductController@index')->name('index');
			Route::get('product/create', 'Admin\ProductController@create')->name('create');
			Route::delete('product/{model}', 'Admin\ProductController@destroy')->name('destroy');
			Route::put('product/{model}', 'Admin\ProductController@update')->name('update');
			Route::get('product/{model}', 'Admin\ProductController@show')->name('show');
			Route::get('product/{model}/edit', 'Admin\ProductController@edit')->name('edit');
			
			Route::post('product/images', 'Admin\ProductController@imageStore')->name('image.store');
			Route::get('product/{model}/images', 'Admin\ProductController@images')->name('images');
			Route::delete('product/images/{image}', 'Admin\ProductController@imageDestroy')->name('image.destroy');
		});
	});

	Route::get('table/category', 'Admin\CategoryController@dataTable')->name('table.category');
	Route::get('table/tag', 'Admin\TagController@dataTable')->name('table.tag');
	Route::get('table/product', 'Admin\ProductController@dataTable')->name('table.product');

	Route::get('export/product', 'Admin\ProductController@export')->name('product.export');
});

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('customer')->group(function() {
	Route::get('/login', 'Auth\CustomerLoginController@showLoginForm')->name('customer.login');
	Route::post('/login', 'Auth\CustomerLoginController@login')->name('customer.login.submit');
	Route::get('/', 'CustomerController@index')->name('customer.dashboard');
});

// Route::resource('admin/category', 'Admin\CategoryController');
Route::post('admin/users/search', 'Admin\UserController@search')->name('users.search');
Route::resource('admin/users', 'Admin\UserController');
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

Route::get('/admin', function () {
    return view('admin.dashboard');
});




Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('customer')->group(function() {
	Route::get('/login', 'Auth\CustomerLoginController@showLoginForm')->name('customer.login');
	Route::post('/login', 'Auth\CustomerLoginController@login')->name('customer.login.submit');
	Route::get('/', 'CustomerController@index')->name('customer.dashboard');
});


// Route::resource('admin/category', 'Admin\CategoryController');

Route::post('/admin/category/', 'Admin\CategoryController@store')->name('category.store');
Route::get('/admin/category/', 'Admin\CategoryController@index')->name('category.index');
Route::get('/admin/category/create', 'Admin\CategoryController@create')->name('category.create');
Route::delete('/admin/category/{model}', 'Admin\CategoryController@destroy')->name('category.destroy');
Route::put('/admin/category/{model}', 'Admin\CategoryController@update')->name('category.update');
Route::get('/admin/category/{model}', 'Admin\CategoryController@show')->name('category.show');
Route::get('/admin/category/{model}/edit', 'Admin\CategoryController@edit')->name('category.edit');

Route::get('table/category', 'Admin\CategoryController@dataTable')->name('table.category');

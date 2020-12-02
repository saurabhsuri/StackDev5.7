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
    return view('welcome');
});
Route::get('test', function(){
		//$check_password=App\User::where(['admin'=>1])->first();
		//echo $check_password;
		$password = Hash::make('goodboy786');//hashing password to store encrypted pass in mysql
		//echo $password;
		$email=Session::get('adminSession');
		echo $email;
	});
Route::match(['get','post'],'admin','AdminController@login');
Route::get('logout','AdminController@logout');

Route::group(['middleware'=>['auth']],function(){
	Route::get('admin/dashboard','AdminController@dashboard');
	Route::get('admin/settings', 'AdminController@settings');
	Route::get('admin/check-password','AdminController@check_password');
	Route::match(['get','post'],'admin/update-pwd','AdminController@updatePassword');
	//Category Routes
	Route::match(['get','post'],'admin/add-category','CategoryController@addCategory');
	Route::get('admin/view-category','CategoryController@viewCategories');
	Route::match(['get','post'],'admin/edit-category/{id}','CategoryController@editCategory');
	Route::get('admin/delete-category/{id}','CategoryController@deleteCategory');

	//Products
	Route::match(['get','post'],'admin/add-product','ProductsController@addProducts');

});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

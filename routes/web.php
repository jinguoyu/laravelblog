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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/','App\IndexController@index');


//后台

Route::any('admin/login','Admin\LoginController@login');
Route::get('admin/code','Admin\LoginController@code'); //验证码
Route::get('admin/getcode','Admin\LoginController@getcode'); //验证码

Route::get('admin/crypt','Admin\LoginController@crypt'); //验证码


//中间件，用来验证是否登录
Route::group(['middleware'=>['web','admin.login'],'prefix'=>'admin','namespace'=>'Admin'],function(){

	Route::get('index','IndexController@index');//后台首页
	Route::get('quit','LoginController@quit'); //后台退出登录
	Route::any('user/revise','UserController@revise');
	//Route::any('crypt','LoginController@crypt');
	Route::post('user/post', 'UserController@store');//修改用户密码的表单验证
	Route::post('category/orderchang','CategoryController@orderchang');//分类页异步修改排序
	Route::resource('/prompt','PromptController');  //资源路由 后台跳转页面

	Route::resource('category','CategoryController');  //资源路由 后台分类
	Route::resource('article','ArticleController');  //资源路由 后台文章

});








//前台


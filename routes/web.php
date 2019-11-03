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

//Route::any('/upload','ImgController@upload');


Route::get('/','IndexController@index');
Route::get('/index/cate/php','IndexController@php');


Route::get('/admin','Admin\AdminController@index');
Route::get('/admin/nav/list','Admin\NavController@lists');
Route::get('/admin/nav/get_list','Admin\NavController@get_list');
Route::get('/admin/nav/edit','Admin\NavController@edit');
Route::any('/admin/nav/edit_do','Admin\NavController@edit_do');
Route::any('/admin/nav/del','Admin\NavController@del');
Route::any('/admin/nav/add','Admin\NavController@add');


Route::any('/admin/cate/index','Admin\CateController@index');
Route::any('/admin/cate/get_cate','Admin\CateController@get_cate');
Route::any('/admin/cate/add','Admin\CateController@add');
Route::any('/admin/cate/del','Admin\CateController@del');
Route::any('/admin/cate/edit','Admin\CateController@edit');
Route::any('/admin/cate/edit_do','Admin\CateController@edit_do');
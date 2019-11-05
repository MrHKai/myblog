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

Route::get('/','IndexController@index');
Route::get('/admin','Admin\AdminController@index');
Route::get('/index/cate/php','IndexController@php');

Route::any('/upload','Common\CommonController@upload');                 // 普通上传文件
Route::any('/uploadLayedit','Common\CommonController@uploadLayedit');   // 富文本编辑器上传文件
/**
 * Admin模块
 */
Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => ['web']], function () {
    $arr = [
        'nav' => ['lists', 'get_list', 'edit', 'edit_do','del','add'],
        'cate' => ['index', 'get_cate', 'edit', 'edit_do','del','add'],
        'article' => ['index','add','get_cate'],
    ];
    foreach ($arr as $k => $v) {
        Route::any($k, ucfirst($k) . 'Controller@index');
        foreach ($v as $vv) {
            Route::any("/$k/$vv", ucfirst($k) . 'Controller@' . $vv);
        }
    }
});
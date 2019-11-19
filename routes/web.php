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

# 前台首页和后台首页
Route::get('/','IndexController@index');
Route::get('/admin','Admin\AdminController@index');
Route::get('/wuziqi','IndexController@wuziqi');

// 管理员登陆
Route::get('/login','Admin\LoginController@login');
Route::post('/loginDo','Admin\LoginController@loginDo');

// 用户端登陆
Route::get('/index/login','Index\LoginController@login');
Route::post('/index/loginDo','Index\LoginController@loginDo');
Route::get('/index/reg','Index\LoginController@reg');
Route::post('/index/regDo','Index\LoginController@regDo');



Route::any('/sendPhoneCode','Common\CommonController@sendPhoneCode');   // 发送手机验证码
Route::any('/upload','Common\CommonController@upload');                 // 普通上传文件
Route::any('/uploadLayedit','Common\CommonController@uploadLayedit');   // 富文本编辑器上传文件


/**
 * Admin模块
 */
Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => ['web']], function () {
    $arr = [
        'nav' => ['lists', 'get_list', 'edit', 'edit_do','del','add'],
        'cate' => ['index', 'get_cate', 'edit', 'edit_do','del','add'],
        'article' => ['index','add','get_cate','get_art','del','edit','edit_do'],
    ];
    foreach ($arr as $k => $v) {
        Route::any($k, ucfirst($k) . 'Controller@index');
        foreach ($v as $vv) {
            Route::any("/$k/$vv", ucfirst($k) . 'Controller@' . $vv);
        }
    }
});

/**
 * Index模块
 */
Route::group(['prefix' => 'index', 'namespace' => 'Index', 'middleware' => ['web']], function () {
    $arr = [
        'article' => ['content','comment'],
        'case' => ['index'],
    ];
     foreach ($arr as $k => $v) {
        Route::any($k, ucfirst($k) . 'Controller@index');
        foreach ($v as $vv) {
            Route::any("/$k/$vv", ucfirst($k) . 'Controller@' . $vv);
        }
    }
});
<?php

namespace App\Http\Controllers;

use App\Model\CateModel;
use Illuminate\Http\Request;
use App\Model\NavModel;
class IndexController extends Controller
{
    //
    public function index()
    {

        # 导航栏数据
        $nav_data = NavModel::where('nav_is_show',1)->limit(10)->get();

        # 首页数据
        $cate_data = CateModel::where('cate_is_show',1)->limit(6)->get();
        return view('index.index.index',compact('nav_data','cate_data'));
    }

    public function php()
    {
        # 导航栏数据
        $nav_data = NavModel::where('nav_is_show',1)->limit(10)->get();
        # 首页数据
        $cate_data = CateModel::where('cate_is_show',1)->limit(6)->get();
        return view('index.cate.php',compact('nav_data','cate_data'));
    }


}

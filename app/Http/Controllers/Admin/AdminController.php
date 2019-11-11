<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\NavModel;
use App\Http\Controllers\Common\CommonController;
class AdminController extends CommonController
{
    public function index()
    {
        # 导航栏数据
        $nav_data = NavModel::where('nav_is_show',1)->limit(10)->get();
        return view('admin/index/index',compact('nav_data'));
    }


}

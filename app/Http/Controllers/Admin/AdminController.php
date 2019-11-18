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
        return view('admin/index/index');
    }


}

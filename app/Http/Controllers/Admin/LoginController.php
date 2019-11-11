<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\NavModel;
use App\Http\Controllers\Common\CommonController;
class LoginController extends CommonController
{
    /**
     * 登陆控制器
     * @login 登陆
     */

    public function login(Request $request)
    {
         return view('/admin/login/login');
    }

    public function loginDo(Request $request)
    {
        $data = $request->input();
        dd($data);
    }
}

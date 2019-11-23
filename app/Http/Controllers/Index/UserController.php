<?php

namespace App\Http\Controllers\Index;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Common\CommonController;

class UserController extends CommonController
{
    //
    public function index(Request $request)
    {
        return view('/index/user/home');
    }
}

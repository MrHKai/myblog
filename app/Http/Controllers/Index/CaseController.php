<?php

namespace App\Http\Controllers\Index;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Common\CommonController;

class CaseController extends CommonController
{
    //

    public function index()
    {
        return view('/index/case/index');
    }
}

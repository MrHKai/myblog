<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\NavModel;
class IndexController extends Controller
{
    //
    public function index()
    {

        $nav_data = NavModel::where('nav_is_show',1)->limit(10)->get();
        return view('index.index.index',compact('nav_data'));
    }


}

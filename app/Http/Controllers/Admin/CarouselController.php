<?php

namespace App\Http\Controllers\Admin;

use App\Model\Carousel_cateModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Common\CommonController;

class CarouselController extends CommonController
{
    /**
     *  轮播
     */

    public function index(Request $request)
    {
        return view('/admin/carousel/index');
    }

    public function get_carousel_cate(Request $request)
    {

        // 执行查询语句
        $Carousel_data = Carousel_cateModel::get()->toArray();

        $count = count($Carousel_data);

        foreach ($Carousel_data as $k => $v){
            $Carousel_data[$k]['c_time'] = date('Y-m-d',$v['c_time']);
        }



        $res = ['code'=>0,'msg'=>'','count'=>$count,'data'=>$Carousel_data];
        return json_encode($res);
    }
}

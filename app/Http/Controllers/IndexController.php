<?php

namespace App\Http\Controllers;

use App\Model\CateModel;
use Illuminate\Http\Request;
use App\Model\NavModel;
use App\Model\ArticleModel;
use App\Http\Controllers\Common\CommonController;
class IndexController extends CommonController
{
    //
    public function index(Request $request)
    {

        $is_jing = $request->is_jing;
        $read = $request->read;
        $type = $request->type ? $request->type : 0 ;

        if ($type != 0){
            $where[] = ['text_type','=',$type];
        }

        if ($read != null){
            $field = 'read';
        }else{
            $field = 'c_time';
        }

        $where[] = ['is_show','=',1];
        $where[] = ['art_status','=',1];
        $where[] = ['is_top','=',0];

        $data = ArticleModel::join('blogs_user','blogs_article.user_id','=','blogs_user.user_id')
            ->where($where)->orderBy($field,'desc')->paginate(20);

        $data_top = ArticleModel::join('blogs_user','blogs_article.user_id','=','blogs_user.user_id')
            ->where(['is_show'=>1,'art_status'=>1,'is_top'=>1])->orderBy('c_time','desc')->paginate(5);

        $is_boutique = [1=>'精帖',0=>'普帖'];
        foreach ($data as $k=>$v){
            $data[$k]->c_time = date('m-d H:i',$v->c_time);
            $data[$k]->is_boutique = $is_boutique[$v->is_boutique];

            if (mb_strlen($v->art_title) > 40){
                $data[$k]->art_title = substr($v->art_title,0,90).'...';
            }

        }
        foreach ($data_top as $k=>$v){
            $data_top[$k]->c_time = date('m-d H:i',$v->c_time);
            $data_top[$k]->is_boutique = $is_boutique[$v->is_boutique];

            if (mb_strlen($v->art_title) > 40){
                $data_top[$k]->art_title = substr($v->art_title,0,90).'...';
            }

        }

        return view('/index',compact('data','data_top','type','field'));
    }

    public function wuziqi()
    {
        $tr = [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16];
        $td = [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16];
        return view('/wuziqi',compact('nav_data','tr','td'));
    }


}

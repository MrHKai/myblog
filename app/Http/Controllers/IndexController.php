<?php

namespace App\Http\Controllers;

use App\Model\CateModel;
use Illuminate\Http\Request;
use App\Model\NavModel;
use App\Model\ArticleModel;
class IndexController extends Controller
{
    //
    public function index()
    {

        $data = ArticleModel::join('blogs_user','blogs_article.user_id','=','blogs_user.user_id')
            ->where(['is_show'=>1,'art_status'=>1])->orderBy('read','desc')->paginate(21);

        $text_type = [0 => '普帖',1 => '提问',2 => '分享', 3 => '建议',4 => '悬赏',5 => '讨论',];
        $is_boutique = [1=>'精帖',0=>'普帖'];
        foreach ($data as $k=>$v){
            $data[$k]->c_time = date('H:i',$v->c_time);
            $data[$k]->text_type = $text_type[$v->text_type];
            $data[$k]->is_boutique = $is_boutique[$v->is_boutique];

            if (mb_strlen($v->art_title) > 40){
                $data[$k]->art_title = substr($v->art_title,0,90).'...';
            }

        }

        return view('/index',compact('data'));
    }

    public function wuziqi()
    {
        # 导航栏数据
        $nav_data = NavModel::where('nav_is_show',1)->limit(10)->get();

        $tr = [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16];
        $td = [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16];
        return view('/wuziqi',compact('nav_data','tr','td'));
    }


}

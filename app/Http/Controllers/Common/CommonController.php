<?php

namespace App\Http\Controllers\Common;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommonController extends Controller
{
    /**
     * 公共方法类
     * @ajaxMsgOk       成功返回信息
     * @ajaxMsgError    失败返回信息
     */
    public static function ajaxMsgOk($msg = 'success',$code = 200 , $icon = 6)
    {
        return json_encode(['msg' => $msg,'code' => $code,'icon'=>$icon]);
    }

    public static function ajaxMsgError($msg = 'error',$code = 0 , $icon = 5)
    {
        return json_encode(['msg' => $msg,'code' => $code,'icon'=>$icon]);
    }
}

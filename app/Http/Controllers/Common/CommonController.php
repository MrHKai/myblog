<?php

namespace App\Http\Controllers\Common;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommonController extends Controller
{
    /**
     * 公共方法类
     * @ajaxMsgOk           成功返回信息
     * @ajaxMsgError        失败返回信息
     * @ajaxDataok          成功返回数据
     * @upload              上传图片
     * @uploadLayedit       富文本上传图片
     */
    public static function ajaxMsgOk($msg = 'success',$code = 200 , $icon = 6)
    {
        return json_encode(['msg' => $msg,'code' => $code,'icon'=>$icon]);
    }

    public static function ajaxMsgError($msg = 'error',$code = 0 , $icon = 5)
    {
        return json_encode(['msg' => $msg,'code' => $code,'icon'=>$icon]);
    }

    public static function ajaxDataOk($data = [],$msg = 'success',$code = 200 , $icon = 6)
    {
        return json_encode(['data'=>$data,'msg' => $msg,'code' => $code,'icon'=>$icon]);
    }

    public function upload(Request $request)
    {
        $file = $request->file('file'); // 获取上传的文件
        if($file==null){
            exit(json_encode(array('code'=>2,'msg'=>'未上传图片')));
            return self::ajaxMsgError('图片信息错误');
        }
        // 获取文件后缀
        $temp = explode(".", $_FILES["file"]["name"]);
        $extension = end($temp);
        // 判断文件是否合法
        if(!in_array($extension,array("gif","jpeg","jpg","png"))){
            exit(json_encode(array('code'=>2,'msg'=>'上传图片不合法')));
        };
        $path = public_path('/uploads/'.date('Ymd'));
        $name = date('YmdHis').mt_rand(100000,999999).'.'.$extension;
        $info = $file->move($path,$name); // 移动文件到指定目录 没有则创建

        return json_encode(array('code'=>200,'src'=>'/uploads/'.date('Ymd').'/'.$name,'msg'=>'上传成功'));
    }


    public function uploadLayedit(Request $request)
    {
        $file = $request->file('file'); // 获取上传的文件
        if($file==null){
            exit(json_encode(array('code'=>2,'msg'=>'未上传图片')));
            return self::ajaxMsgError('图片信息错误');
        }
        // 获取文件后缀
        $temp = explode(".", $_FILES["file"]["name"]);
        $extension = end($temp);
        // 判断文件是否合法
        if(!in_array($extension,array("gif","jpeg","jpg","png"))){
            exit(json_encode(array('code'=>2,'msg'=>'上传图片不合法')));
        };
        $path = public_path('/uploads/'.date('Ymd'));
        $name = date('YmdHis').mt_rand(100000,999999).'.'.$extension;
        $info = $file->move($path,$name); // 移动文件到指定目录 没有则创建
        $data = [
            'code' => 0,
            'msg' => '上传成功',
            'data'=> [
                'src' => '/uploads/'.date('Ymd').'/'.$name,
                'title' => ''
            ]
        ];
        return json_encode($data);
    }
}

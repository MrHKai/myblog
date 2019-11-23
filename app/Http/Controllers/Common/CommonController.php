<?php

namespace App\Http\Controllers\Common;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\UserModel;
class CommonController extends Controller
{
    /**
     * 公共方法类
     * @ajaxMsgOk           成功返回信息
     * @ajaxMsgError        失败返回信息
     * @ajaxDataok          成功返回数据
     * @upload              上传图片
     * @uploadLayedit       富文本上传图片
     * @sendPhoneCode       发送短信验证码
     * @checkLogin          验证是否登录,获取用户ID
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

    public function sendPhoneCode(Request $request)
    {
        $type = $request->type;     // 1 是注册发送短信
        $phone = $request->phone;

        $count = UserModel::where('user_phone',$phone)->count();

        if ($type == 1){
            if ($count >= 1){
                return self::ajaxMsgError('该手机号已注册,如密码忘记请找回密码');
            }
        }

        // 发送短信
        $code = rand(1000,9999);
        $session_code_data = [
            'code' => $code,
            'time' => time()
        ];
        session([$phone.'_phone_code'=>$session_code_data]);
        $host = "http://dingxin.market.alicloudapi.com";
        $path = "/dx/sendSms";
        $method = "POST";
        $appcode = "b3c0312eb0604c5f970d3dac83486db5";
        $headers = array();
        array_push($headers, "Authorization:APPCODE " . $appcode);
        $querys = "mobile=".$phone."&param=code:".$code."&tpl_id=TP1711063";
        $bodys = "";
        $url = $host . $path . "?" . $querys;

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $method);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($curl, CURLOPT_FAILONERROR, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, true);
//        if (1 == strpos("$".$host, "https://"))
//        {
//            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
//            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
//        }

        return self::ajaxMsgOk('发送成功,请注意查收,五分钟内输入有效');


    }

    public static function checkLogin()
    {
        $user_info = session('user_info');
        if (empty($user_info)){
            return false;
        }else{
            $user_id = UserModel::where('username',$user_info['username'])->value('user_id');
            return $user_id;
        }
    }
}

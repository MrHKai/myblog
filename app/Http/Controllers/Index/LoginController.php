<?php

namespace App\Http\Controllers\Index;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Common\CommonController;
use App\Model\UserModel;
use Illuminate\Support\Facades\DB;

class LoginController extends CommonController
{
    /**
     * @login           登录模板
     * @loginDo         登陆方法
     * @reg             注册模板
     * @regDo           注册方法
     */

    public function login()
    {
        return view('/index/login/login');
    }

    public function loginDo(Request $request)
    {
        $username = $request->username;
        $password = $request->password;
        $code = $request->code;
        if ($username == null){
            return self::ajaxMsgOk('请输入用户名');
        }

        if ($code != 10){
            return self::ajaxMsgError('验证码错误');
        }

        # 查询用户是否存在
        $first = UserModel::where('username',$username)->first();
        if ($first == null){
            return self::ajaxMsgOk('用户名或密码错误');
        }

        # 判断密码是否正确
        if (md5($password) != $first->password){
            return self::ajaxMsgOk('用户名或密码错误');
        }else{

            $user_hot = $first->user_hot + 1;
            UserModel::where('user_id',$first->user_id)->update(['user_hot'=>$user_hot]);
            # 存session
            $user_info = [
                'username' => $username,
                'user_logo' => $first->user_logo,
                'time'  => time()
            ];
            session(['user_info' => $user_info]);

            # 登陆成功
            return self::ajaxMsgOk('登陆成功');
        }

    }

    public function reg()
    {
        return view('/index/login/reg');
    }

    public function regDo(Request $request)
    {
        $data = $request->input();

        // 验证
        if (empty($data['username'])){
            return self::ajaxMsgError('请输入用户名');
        }
        if (empty($data['password'])){
            return self::ajaxMsgError('请输入密码');
        }
        if (empty($data['user_phone'])){
            return self::ajaxMsgError('请输入手机号');
        }
        if (empty($data['code'])){
            return self::ajaxMsgError('请输入验证码');
        }

        $count = UserModel::where('username',$data['username'])->count();
        $count2 = UserModel::where('user_phone',$data['user_phone'])->count();
        if ($count >= 1){
            return self::ajaxMsgError('该用户名已存在,请重新输入');
        }
        if ($count2 >= 1){
            return self::ajaxMsgError('该手机号已注册,请登录');
        }

        # 获取验证码
        $session_code_data = session($data['user_phone'].'_phone_code');

        # 验证验证码
        if (!$session_code_data || $data['code'] != $session_code_data['code']){
            return self::ajaxMsgError('验证码错误');
        }
        if (mb_strlen($data['password']) > 16 || mb_strlen($data['password']) < 6 ){
            return self::ajaxMsgError('密码长度6-16位字母,数字,下划线');
        }
        # 密码加密
        $data['password'] = md5($data['password']);
        $data['user_logo'] = '/images/indexlogo.jpg';
        unset($data['code']);
        $res = UserModel::insert($data);
        if ($res){
            return self::ajaxMsgOk('注册成功,请点击登录');
        }else{
            return self::ajaxMsgError('注册失败,请重试');
        }

    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Model\ArticleModel;
use App\Model\UserModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Common\CommonController;
use Illuminate\Support\Facades\DB;

class UserController extends CommonController
{
    /**
     * 用户管理
     * @index           首页
     * @get_user        获取用户列表
     * @del             删除
     * @add             添加
     * @edit            修改视图
     * @edit_do         修改执行
     * checkForm        添加时的表单验证
     * checkForm_edit   修改时的表单验证
     */

    public function index()
    {
        return view('/admin/user/index');
    }

    public function get_user(Request $request)
    {
        $page = $request->page;                 # 页码
        $limit = $request->limit;               # 每页显示条数
        $start = ($page - 1) * $limit;          # 每页起始位置

        $username = $request->username ? $request->username : '';         # 发帖用户
        $user_phone = $request->user_phone ? $request->user_phone : '';   # 手机号

        $where = [];
        if ($username){
            $where[] = ['username','=',$username];
        }
        if ($user_phone){
            $where[] = ['user_phone','=',$user_phone];
        }

        // 执行Sql语句
        $user_data = UserModel::where($where)->offset($start)->limit($limit)
            ->get()->toArray();
        $count = UserModel::where($where)->count();

        foreach ($user_data as $k => $v){
            $user_data[$k]['count'] = ArticleModel::where('user_id',$v['user_id'])->count();    # 用户发帖数量
        }

        $res = ['code'=>0,'msg'=>'','count'=>$count,'data'=>$user_data];
        return json_encode($res);
    }

    public function del(Request $request)
    {
        $user_id = $request->user_id;
        $status = $request->status;
        if (empty($user_id)){
            return self::ajaxMsgError('参数错误');
        }
        $res = UserModel::where('user_id',$user_id)->update(['user_status'=>$status]);

        if ($res){
            return self::ajaxMsgOk('操作成功');
        }else{
            return self::ajaxMsgError('操作失败');
        }
    }

    public function add(Request $request)
    {
        $data = $request->input();
        # 如果$data为空 ，显示添加视图
        if ($data == null){
            return view('/admin/user/add');
        }else{
            # 如果是添加执行
            $data = $this->checkForm($data);

            # 进行判断
            if (!is_array($data)){
                return $data;
            }
            # 添加
            $data['user_c_time'] = time();
            $res=UserModel::insert($data);
            if ($res){
                return self::ajaxMsgOk('添加成功');
            }else{
                return self::ajaxMsgError('添加失败');
            }
        }
    }

    public function edit(Request $request)
    {
        $user_id = $request->user_id;
        $data = UserModel::where('user_id',$user_id)->first()->toArray();

        return view('/admin/user/edit',compact('data'));

    }

    public function edit_do(Request $request)
    {
        $data = $request->input();

        # 表单验证
        $data = $this->checkForm_edit($data);

        # 进行判断
        if (!is_array($data)){
            return $data;
        }

        # 修改
        $data['user_u_time'] = time();

        $res=UserModel::where('user_id',$data['user_id'])->update($data);
        if ($res){
            return self::ajaxMsgOk('修改成功');
        }else{
            return self::ajaxMsgError('修改失败');
        }
    }

    function checkForm_edit($data)
    {
        # 判断密码是否更改
        if (empty($data['password'])){
            unset($data['password']);
        }else{
            $data['password'] = md5($data['password']);
        }

        # 判断用户名
        $count = UserModel::where([['username','=',$data['username']],['user_id','!=',$data['user_id']]])->count();
        if (empty($data['username'])){
            return self::ajaxMsgError('名称不能为空');
        }elseif ($count >0 ){
            return self::ajaxMsgError('名称已被注册');
        }

        # 判断手机号
        $count = UserModel::where([['user_phone','=',$data['user_phone']],['user_id','!=',$data['user_id']]])->count();
        if (empty($data['user_phone'])){
            return self::ajaxMsgError('手机号不能为空');
        }elseif ($count > 0){
            return self::ajaxMsgError('手机号已被注册');
        }

        unset($data['file']);
        return $data;
    }

    function checkForm($data){
        $count = UserModel::where('username',$data['username'])->count();
        # 判断用户名
        if (empty($data['username'])){
            return self::ajaxMsgError('名称不能为空');
        }elseif ($count >0 ){
            return self::ajaxMsgError('名称已被注册');
        }
        # 判断密码
        if (empty($data['password'])){
            return self::ajaxMsgError('密码不能为空');
        }else{
            $data['password'] = md5($data['password']);
        }
        # 判断手机号
        $count = UserModel::where('user_phone',$data['user_phone'])->count();
        if (empty($data['user_phone'])){
            return self::ajaxMsgError('手机号不能为空');
        }elseif ($count > 0){
            return self::ajaxMsgError('手机号已被注册');
        }
        unset($data['file']);   # 多余字段
        return $data;
    }
}

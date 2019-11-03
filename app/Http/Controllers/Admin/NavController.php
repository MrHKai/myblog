<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\NavModel;
use App\Http\Controllers\Common\CommonController;
class NavController extends CommonController
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * 导航栏列表
     */
    public function lists()
    {
        $data = NavModel::where('nav_status',1)->get();
        return view('admin.nav.lists',compact('data'));
    }

    /**
     * 获取数据
     */
    public function get_list()
    {
        $info = NavModel::where(['nav_status'=>1])->get();

        foreach ($info as $k => $v){
            if ($v->nav_is_show == 1){
                $info[$k]->nav_is_show = '展示';
            }else{
                $info[$k]->nav_is_show = '隐藏';
            }
        }

        $count = NavModel::where('nav_status',1)->count();
        $res = ['code'=>0,'msg'=>'','count'=>$count,'data'=>$info];
        return json_encode($res);
    }

    /**
     * @param Request $request
     * 修改
     */
    public function edit(Request $request)
    {
        $nav_id = $request->id;
        if ($nav_id == null){
            return redirect('/admin/nav/list')->with('status','参数错误');
        }
        $nav_data = NavModel::where('nav_id',$nav_id)->first();
        return view('/admin/nav/edit',compact('nav_data'));
    }

    public function edit_do(Request $request)
    {
        $data = $request->input();
        #----判断
        if (empty($data['nav_id'])){
            return CommonController::ajaxMsgError('参数错误');
        }
        if (empty($data['nav_name'])){
            return CommonController::ajaxMsgError('请输入导航名称');
        }
        if (empty($data['nav_is_show'])){
            $data['nav_is_show'] = 2;
        }
        $data['u_time'] = time();
        $res = NavModel::where('nav_id',$data['nav_id'])->update($data);
        if ($res){
            return CommonController::ajaxMsgOk('修改成功');
        }else{
           return CommonController::ajaxMsgError('修改失败');
        }
    }

    /**
     * @param Request $request
     * @return string
     * 软删除
     */
    public function del(Request $request)
    {
        $nav_id = $request->nav_id;
        if (empty($nav_id)){
            return CommonController::ajaxMsgError('参数错误');
        }
        $res = NavModel::where('nav_id',$nav_id)->update(['nav_status'=>2]);

        if ($res){
            return CommonController::ajaxMsgOk('删除成功');
        }else{
            return CommonController::ajaxMsgError('删除失败');
        }
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|string
     * 添加
     */
    public function add(Request $request)
    {
        $data = $request->input();
        if ($data == []){
            return view('/admin/nav/add');
        }else{
            if (empty($data['nav_name'])){
                return CommonController::ajaxMsgError('请输入导航名称');
            }
            if (empty($data['nav_is_show'])){
                $data['nav_is_show'] = 2;
            }
            $data['c_time'] = time();
            $res = NavModel::insert($data);
            if ($res){
                return CommonController::ajaxMsgOk('添加成功');
            }else{
                return CommonController::ajaxMsgError('添加失败');
            }
        }
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Model\NavModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\CateModel;
use App\Http\Controllers\Common\CommonController;
class CateController extends CommonController
{
    public function index()
    {
        return view('/admin/cate/index');
    }

    /**
     * @param Request $request
     * @return string
     * 获取首页数据
     */
    public function get_cate(Request $request)
    {
        $info = CateModel::join('blogs_nav','blogs_cate.nav_id','=','blogs_nav.nav_id')->where(['cate_status'=>1])->get();
        foreach ($info as $k => $v){
            if ($v->cate_is_show == 1){
                $info[$k]->cate_is_show = '展示';
            }else{
                $info[$k]->cate_is_show = '关闭';
            }
        }

        $count = CateModel::where('cate_is_show',1)->count();
        $res = ['code'=>0,'msg'=>'','count'=>$count,'data'=>$info];
        return json_encode($res);
    }

    /**
     * @param Request $request
     * @return $this|\Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     * 修改视图
     */
    public function edit(Request $request)
    {
        $cate_id = $request->id;
        if ($cate_id == null){
            return redirect('/admin/nav/list')->with('status','参数错误');
        }
        $cate_data = CateModel::where('cate_id',$cate_id)->first();
        $nav_data = NavModel::where('nav_status',1)->select('nav_id','nav_name')->get();
        return view('/admin/cate/edit',compact('cate_data','nav_data'));
    }

    public function edit_do(Request $request)
    {
        $data = $request->input();
        #----判断
        if (empty($data['cate_id'])){
            return self::ajaxMsgError('参数错误');
        }
        if (empty($data['cate_name'])){
            return self::ajaxMsgError('请输入分类名称');
        }
        if (empty($data['cate_is_show'])){
            $data['cate_is_show'] = 2;
        }
        $data['u_time'] = time();
        $res = CateModel::where('cate_id',$data['cate_id'])->update($data);
        if ($res){
            return self::ajaxMsgOk('修改成功');
        }else{
            return self::ajaxMsgError('修改失败');
        }
    }
    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|string
     * 添加分类
     */
    public function add(Request $request)
    {
        $data = $request->input();
        if ($data == []){
            $nav_data = NavModel::where('nav_status',1)->select('nav_id','nav_name')->get();
            return view('/admin/cate/add',compact('nav_data'));
        }else{
            if (empty($data['cate_name'])){
                return self::ajaxMsgError('请输入分类名称');
            }
            if (empty($data['cate_is_show'])){
                $data['cate_is_show'] = 2;
            }
            $data['c_time'] = time();
            $res = CateModel::insert($data);
            if ($res){
                return self::ajaxMsgOk('添加成功');
            }else{
                return self::ajaxMsgError('添加失败');
            }
        }

    }

    /**
     * @param Request $request
     * @return string
     * 删除分类
     */
    public function del(Request $request)
    {
        $cate_id = $request->cate_id;
        if (empty($cate_id)){
            return self::ajaxMsgError('参数错误');
        }
        $res = CateModel::where('cate_id',$cate_id)->update(['cate_status'=>2]);

        if ($res){
            return self::ajaxMsgOk('删除成功');
        }else{
            return self::ajaxMsgError('删除失败');
        }
    }
}

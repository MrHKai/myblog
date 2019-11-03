<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\NavModel;
class NavController extends Controller
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
        $info = NavModel::where('nav_status',1)->get();

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
}

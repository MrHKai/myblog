<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Common\CommonController;
use App\Model\ArticleModel;
use App\Model\NavModel;
use App\Model\CateModel;
class ArticleController extends CommonController
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * 文章表
     * @index           首页
     * @add             添加
     * @checkForm       表单验证
     * @get_art         获取文章列表
     * @get_cate        获取分类列表  @return 302 询问是否重定向到分类添加
     * @del             删除
     */

    public function index()
    {
        return view('/admin/article/index');
    }

    public function add(Request $request)
    {
        $data = $request->input();
            # 如果$data为空 ，显示添加视图
        if ($data == null){
            return view('/admin/article/add');
        }else{
            # 如果是添加执行
            $data = $this->checkForm($data);
            # 进行判断
            if (!is_array($data)){
                return $data;
            }
            # 添加
            $data['c_time'] = time();
            $res=ArticleModel::insert($data);
            if ($res){
                return self::ajaxMsgOk('添加成功');
            }else{
                return self::ajaxMsgError('添加失败');
            }
        }

    }

    public function checkForm($data)
    {
        if (empty($data['art_title'])){
            return self::ajaxMsgError('请输入文章标题');
        }
        if (empty($data['art_content'])){
            return self::ajaxMsgError('请输入文章内容');
        }

        unset($data['file']);   # 多余字段
        # 验证全部通过
        return $data;
    }

    public function get_cate(Request $request)
    {
        $nav_id = $request->nav_id;
        if (empty($nav_id)){
            return self::ajaxMsgError('获取文章分类失败');
        }

        $cate_data = CateModel::where(['cate_is_show'=>1,'cate_status'=>1,'nav_id'=>$nav_id])->get()->toArray();
        if ($cate_data == []){
            return self::ajaxMsgError('当前导航下无分类,是否添加分类','302');
        }

        return self::ajaxDataOk($cate_data);

    }

    public function get_art(Request $request)
    {
        $art_data = ArticleModel::where(['art_status'=>1])->get()->toArray();
        if ($art_data == []){
            return self::ajaxMsgError('当前没有文章,是否添加','302');
        }

        $count = ArticleModel::where('art_status',1)->count();
        $res = ['code'=>0,'msg'=>'','count'=>$count,'data'=>$art_data];
        return json_encode($res);

    }

    public function del(Request $request)
    {
        $art_id = $request->art_id;
        if (empty($art_id)){
            return self::ajaxMsgError('参数错误');
        }
        $res = ArticleModel::where('art_id',$art_id)->update(['art_status'=>2]);

        if ($res){
            return self::ajaxMsgOk('删除成功');
        }else{
            return self::ajaxMsgError('删除失败');
        }
    }

    public function edit(Request $request)
    {
        $art_id = $request->art_id;
        if ($art_id == null){
            return redirect('/admin/article/index')->with('status','参数错误');
        }
        $art_data = ArticleModel::where('art_id',$art_id)->first();
        $nav_data = NavModel::where('nav_status',1)->select('nav_id','nav_name')->get();
        $cate_one = CateModel::where('cate_id',$art_data['cate_id'])->first();
        $cate_data = CateModel::where('nav_id',$cate_one['nav_id'])->get();
        return view('/admin/article/edit',compact('art_data','nav_data','cate_one','cate_data'));
    }

    public function edit_do(Request $request)
    {
        $data = $request->input();
        #----判断
        $data = $this->checkForm($data);
        $data['u_time'] = time();
        $data['is_show'] = 1;
        $res = ArticleModel::where('art_id',$data['art_id'])->update($data);

        if ($res){
            return self::ajaxMsgOk('修改成功');
        }else{
            return self::ajaxMsgError('修改失败');
        }
    }
}

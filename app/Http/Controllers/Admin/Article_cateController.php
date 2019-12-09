<?php

namespace App\Http\Controllers\Admin;

use App\Model\ArticleModel;
use App\Model\CateModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Common\CommonController;
use Illuminate\Support\Facades\DB;

class Article_cateController extends CommonController
{
    /**
     * 文章分类
     * @index           首页
     * @add             添加
     * @edit_do         修改执行
     * @del             删除
     * @get_art_cate    获取数据
     */
    public function index(Request $request)
    {
        return view('/admin/article_cate/index');
    }

    public function add(Request $request)
    {
        $data = $request->input();
        # 如果$data为空 ，显示添加视图
        if ($data == null){
            return view('/admin/article_cate/add');
        }else{
            # 如果是添加执行
            if (!$data['cate_name']){
                return self::ajaxMsgError('请输入分类名称');
            }
            # 添加
            $data['c_time'] = time();
            $res=CateModel::insert($data);
            if ($res){
                return self::ajaxMsgOk('添加成功');
            }else{
                return self::ajaxMsgError('添加失败');
            }
        }
    }

    public function get_art_cate(Request $request)
    {
        // 执行查询语句
        $cate_data = CateModel::get()->toArray();

        foreach ($cate_data as $k => $v){
            $cate_data[$k]['count'] = ArticleModel::where('text_type',$v['cate_id'])->count();  # 分类下文章
            $cate_data[$k]['c_time'] = date('Y-m-d',$v['c_time']);                       # 添加时间
        }

        if ($cate_data == []){
            return self::ajaxMsgError('当前没有分类,是否添加','302');
        }

        $count = count($cate_data);
        $res = ['code'=>0,'msg'=>'','count'=>$count,'data'=>$cate_data];
        return json_encode($res);
    }

    public function edit_do(Request $request)
    {
        $cate_id = $request->cate_id;
        $value = $request->value;

        if (!$cate_id || !$value){
            return self::ajaxMsgError('参数错误');
        }

        $res = CateModel::where('cate_id',$cate_id)->update(['cate_name'=>$value]);
        if ($res){
            return self::ajaxMsgOk('修改成功');
        }else{
            return self::ajaxMsgError('修改失败');
        }

    }

    public function del(Request $request)
    {
        $cate_id = $request->cate_id;
        if (empty($cate_id)){
            return self::ajaxMsgError('参数错误');
        }
        $res = CateModel::where('cate_id',$cate_id)->delete();

        if ($res){
            return self::ajaxMsgOk('删除成功');
        }else{
            return self::ajaxMsgError('删除失败');
        }
    }
}

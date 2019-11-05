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
    // 文章表

    public function index()
    {
        return view('/admin/article/index');
    }

    public function add(Request $request)
    {
        $data = $request->input();
            # 如果$data为空 ，显示添加视图
        if ($data == null){
            # 导航栏数据
            $nav_data = NavModel::where('nav_is_show',1)->get();

            return view('/admin/article/add',compact('nav_data'));
        }else{
            # 如果是添加执行
            $data = $this->checkForm($data);
            # 进行判断
            if (!is_array($data)){
                return $data;
            }
            # 添加
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
    /**
     * @param Request $request
     * @return string
     * @return 302 询问是否重定向到分类添加
     */
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

}

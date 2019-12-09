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
     * @del             删除
     * @edit            修改视图
     * @edit_do         修改执行
     */

    public function index()
    {
        $cate = CateModel::where('cate_status',1)->get();
        return view('/admin/article/index',compact('cate'));
    }

    public function add(Request $request)
    {
        $data = $request->input();
            # 如果$data为空 ，显示添加视图
        if ($data == null){
            $cate = CateModel::where('cate_status',1)->get();
            return view('/admin/article/add',compact('cate'));
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

    public function get_art(Request $request)
    {

        $page = $request->page;                 # 页码
        $limit = $request->limit;               # 每页显示条数
        $start = ($page - 1) * $limit;          # 每页起始位置

        $username = $request->username ? $request->username : '';         # 发帖用户
        $art_title = $request->art_title ? $request->art_title : '';      # 文章标题
        $text_type = $request->text_type ? $request->text_type : '';      # 文章标题

        if ($username){
            $where[] = ['username','=',$username];
        }
        if ($art_title){
            $where[] = ['art_title','like',"%$art_title%"];
        }
        if ($text_type){
            $where[] = ['text_type','=',$text_type];
        }
        $where[] = ['art_status','=',1];
        // 执行查询语句
        $art_data = ArticleModel::join('blogs_user as u','u.user_id','=','blogs_article.user_id')
            ->join('blogs_cate as c','c.cate_id','=','blogs_article.text_type')
            ->where($where)
            ->orderBy('art_id','desc')
            ->select('c.cate_name','u.username','blogs_article.*')
            ->offset($start)->limit($limit)
            ->get()->toArray();

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
        # 文章ID
        $art_id = $request->art_id;
        # 文章分类
        $cate = CateModel::where('cate_status',1)->get();
        if ($art_id == null){
            return redirect('/admin/article/index')->with('status','参数错误');
        }
        # 查询文章数据
        $art_data = ArticleModel::where('art_id',$art_id)->first();

        return view('/admin/article/edit',compact('art_data','cate'));
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

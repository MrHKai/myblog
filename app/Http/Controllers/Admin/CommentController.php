<?php

namespace App\Http\Controllers\Admin;

use App\Model\CommentModel;
use App\Model\UserModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Common\CommonController;

class CommentController extends CommonController
{
    /**
     * 评论类
     * @index           首页
     * @del             删除
     * @get_comment     获取数据
     */

    public function index(Request $request)
    {
        return view('/admin/comment/index');
    }

    public function get_comment(Request $request)
    {
        $page = $request->page;                 # 页码
        $limit = $request->limit;               # 每页显示条数
        $start = ($page - 1) * $limit;          # 每页起始位置

        $username = $request->username ? $request->username : '';         # 发帖用户

        $where = [];
        if ($username){
            $where[] = ['username','=',$username];
        }


        // 执行查询语句
        $comment_data = CommentModel::leftjoin('blogs_article as a','blogs_comment.art_id','=','a.art_id')
            ->leftjoin('blogs_user as u','blogs_comment.user_id','=','u.user_id')
            ->offset($start)->limit($limit)
            ->orderBy('comment_id','desc')
            ->where($where)
            ->select('a.art_title','a.user_id as u_id','blogs_comment.*','u.username')
            ->get()->toArray();

        $count = CommentModel::count();

        foreach ($comment_data as $k => $v){
            $comment_data[$k]['art_username'] = UserModel::where('user_id',$v['u_id'])->value('username');
            $comment_data[$k]['c_time'] = date('Y-m-d',$v['c_time']);
        }



        $res = ['code'=>0,'msg'=>'','count'=>$count,'data'=>$comment_data];
        return json_encode($res);
    }

    public function del(Request $request)
    {
        $comment_id = $request->comment_id;
        $status = $request->status;
        if (empty($comment_id)){
            return self::ajaxMsgError('参数错误');
        }
        $res = CommentModel::where('comment_id',$comment_id)->update(['status'=>$status]);

        if ($res){
            return self::ajaxMsgOk();
        }else{
            return self::ajaxMsgError();
        }
    }
}

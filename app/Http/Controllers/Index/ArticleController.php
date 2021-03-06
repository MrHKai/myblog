<?php

namespace App\Http\Controllers\Index;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Common\CommonController;
use App\Model\ArticleModel;
use App\Model\UserModel;
use App\Model\CommentModel;
class ArticleController extends CommonController
{
    /**
     * @content 文章详情
     * @comment 评论
     */
    public function content(Request $request)
    {
        $art_id = $request->art_id;
        $type = $request->type;

        if (empty($art_id)){
            return redirect('/');
        }
        $comment = CommentModel::leftjoin('blogs_user','blogs_user.user_id','=','blogs_comment.user_id')
            ->where('art_id',$art_id)
            ->orderBy('is_ok','desc')
            ->get();
        $comment_count = count($comment);
        $data = ArticleModel::where('art_id',$art_id)->first()->toArray();


        # TODO 浏览量+1
        ArticleModel::where('art_id',$art_id)->update(['read'=>$data['read']+1]);

        $data['c_time'] = date('m-d H:i');
        $user_data = UserModel::where('user_id',$data['user_id'])->first()->toArray();
        foreach ($comment as $k=>$v){
            $comment[$k]->c_time = date('m-d H:i',$v->c_time);
        }
        return view('/index/jie/detail',compact('data','user_data','comment','comment_count','type','art_id'));
    }

    public function comment(Request $request)
    {
        $data = $request->input();

        // 判断是否登录
        $user_id = self::checkLogin();
        if ($user_id === false){
            return self::ajaxMsgError('请登录');
        }
        if ($data['art_id'] == null){
            return self::ajaxMsgError('参数错误');
        }
        if ($data['reply'] == null){
            return self::ajaxMsgError('请输入评论内容');
        }
        $data['user_id'] = $user_id;
        $data['c_time'] = time();

        $res = CommentModel::insert($data);
        if ($res){
            return self::ajaxMsgOk('评论成功');
        }else{
            return self::ajaxMsgOk('系统出错了,请稍后再试');
        }


    }
}

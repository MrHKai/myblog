@extends('layouts.indexCommon')

@section('body')

    <div class="fly-panel detail-box">
        <h1>{{$data['art_title']}}</h1>
        <div class="fly-detail-info">
            <!-- <span class="layui-badge">审核中</span> -->
            @if($data['text_type'] == 6)<a class="layui-badge layui-bg-black">LINUX</a>
            @elseif($data['text_type'] == 1)<a class="layui-badge">PHP</a>
            @elseif($data['text_type'] == 2)<a class="layui-badge layui-bg-orange">MYSQL</a>
            @elseif($data['text_type'] == 3)<a class="layui-badge layui-bg-green">CSS</a>
            @elseif($data['text_type'] == 4)<a class="layui-badge layui-bg-orange">JQUERY</a>
            @elseif($data['text_type'] == 5)<a class="layui-badge layui-bg-blue">NGINX</a>
            @endif

            @if($data['is_boutique'] == 1)
                <a class="layui-badge layui-bg-green">精帖</a>
            @endif

            @if($data['is_top'] == 1)
                <a class="layui-badge layui-bg-blue">置顶</a>
        @endif


        {{--<span class="layui-badge" style="background-color: #999;">未结</span>--}}
        <!-- <span class="layui-badge" style="background-color: #5FB878;">已结</span> -->

            <span class="fly-list-nums">
            <a href="#comment"><i class="iconfont" title="回答">&#xe60c;</i> {{$comment_count}}</a>
            <i class="iconfont" title="人气">&#xe60b;</i> {{$data['read']}}
          </span>
        </div>
        <div class="detail-about" style="height: 40px;">
            <a class="fly-avatar" href="../user/home.html">
                <img src="{{$user_data['user_logo']}}" alt="">
            </a>
            <div class="fly-detail-user">
                <a href="../user/home.html" class="fly-link">
                    <cite>{{$user_data['username']}}</cite>
                    {{--<i class="iconfont icon-renzheng" title="认证信息："></i>--}}
                    <i class="layui-badge fly-badge-vip">VIP{{$user_data['vip']}}</i>
                </a>
                <span>{{$data['c_time']}}</span>
            </div>
            <div class="detail-hits" id="LAY_jieAdmin" data-id="123">
                {{--<span style="padding-right: 10px; color: #FF7200">悬赏：60飞吻</span>--}}
                {{--<span class="layui-btn layui-btn-xs jie-admin" type="edit"><a href="add.html">编辑此贴</a></span>--}}
            </div>
        </div>
        <div class="detail-body photos">
            {!! $data['art_content'] !!}
        </div>
    </div>

    <div class="fly-panel detail-box" id="flyReply">
        <fieldset class="layui-elem-field layui-field-title" style="text-align: center;">
            <legend>回帖</legend>
        </fieldset>

        <ul class="jieda" id="jieda">
            @foreach($comment as $k=>$v)
                <li data-id="111">
                    <a name="item-1111111111"></a>
                    <div class="detail-about detail-about-reply">
                        <a class="fly-avatar" href="">
                            <img src="{{$v->user_logo}}" alt=" ">
                        </a>
                        <div class="fly-detail-user">
                            <a href="" class="fly-link">
                                <cite>{{$v->username}}</cite>
                                <i class="layui-badge fly-badge-vip">VIP{{$v->vip}}</i>
                            </a>
                        </div>
                        <div class="detail-hits">
                            <span>{{$v->c_time}}</span>
                        </div>

                        {{--采纳--}}
                        @if($v->is_ok == 1)
                            <i class="iconfont icon-caina" title="最佳答案"></i>
                        @endif
                    </div>
                    <div class="detail-body2 jieda-body photos">
                        <p>{!! $v->reply !!}</p>
                    </div>
                    <div class="jieda-reply">
                          <span class="jieda-zan">
                            <i class="iconfont icon-zan"></i>
                            <em>0</em>
                          </span>
                          <span type="reply">
                            <i class="iconfont icon-svgmoban53"></i>
                            回复
                          </span>
                        <div class="jieda-admin">
                            {{--<span type="edit">编辑</span>--}}
                            @if($v->is_ok == 0 && $v->username == $user_data['username'])
                                {{--<span type="del">删除</span>--}}

                                <span>采纳</span>
                            @endif
                        </div>
                    </div>
                </li>
            @endforeach


        </ul>
    </div>

    <div class="fly-panel detail-box" id="flyReply">
        <fieldset class="layui-elem-field layui-field-title" style="text-align: center;">
            <legend>回帖</legend>
        </fieldset>


        <div class="layui-form layui-form-pane">
            <form action="#" method="post" class="layui-form" onsubmit="return false">
                <div class="layui-form-item layui-form-text">
                    <input type="hidden" name="art_id" value="{{$art_id}}" id="art_id">
                    <div class="layui-input-block">
                        <textarea id="L_content" name="reply" required lay-verify="required" placeholder="请输入内容"
                                  class="layui-textarea fly-editor" style="height: 150px;"></textarea>
                    </div>
                </div>
                <div class="layui-form-item">
                    <button class="layui-btn" onclick="_reply()">提交回复</button>
                </div>
            </form>
        </div>

    </div>
@endsection

@section('js')
    <script src="/js/jquery-3.2.1.min.js"></script>
    <script src="/layui/layui.js"></script>
    <script>

        var layer = layui.layer;
        function _reply() {
            var reply = $('#L_content').val();
            var art_id = $('#art_id').val();

            $.post(
                '/index/article/comment',
                {reply: reply, art_id: art_id},
                function (res) {
                    layer.msg(res.msg, {icon: res.icon});
                    if (res.code == 200) {
                        location.reload();
                    }
                },
                'json'
            )

            console.log(reply)
        }
        layui.cache.page = 'jie';
        layui.cache.user = {
            username: '游客'
            , uid: -1
            , avatar: '../../res/images/avatar/00.jpg'
            , experience: 83
            , sex: '男'
        };
        layui.config({
            version: "3.0.0"
            , base: '../../res/mods/'
        }).extend({
            fly: 'index'
        }).use(['fly', 'face'], function () {
            var $ = layui.$
                , fly = layui.fly;
            //如果你是采用模版自带的编辑器，你需要开启以下语句来解析。
            $('.detail-body2 ').find('p').each(function () {
                var othis = $(this), html = othis.html();
                othis.html(fly.content(html));
            });
        });
    </script>

@endsection

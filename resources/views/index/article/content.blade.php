@extends('layouts.indexCommon')
@section('amity')
@endsection
@section('button_img')
@endsection
@section('QR_code')
@endsection
@section('hot_user')
@endsection
@section('Carousel')
@endsection
@section('goods')
@endsection

{{-------------------------------------------------content-----------------------------------------------------------}}

@section('content')
    <div class="layui-col-xs12 layui-col-md8" style="height: 200px;">
        <fieldset class="layui-elem-field layui-field-title" style="margin-top: 30px;">
            <legend></legend>
            <blockquote class="layui-elem-quote" style="height: 70px;">
                <div class="user_logo" >
                    <img src="{{$user_data['user_logo']}}" alt="" width="70px;" height="70px;">
                </div>
                <div class="user_two">
                    <span class="layui-user-tag" style="color: #BCD42A">{{$user_data['username']}}</span>
                    <span class="layui-user-tag" style="color: #a2afc8">{{$data['c_time']}}</span>
                    <br>
                    <span class="layui-user-tag" style="color: #a2afc8">
                        @if($data['text_type'] == 1)
                            <span class="layui-badge layui-bg-orange layui-user-tag">提问</span>
                        @elseif($data['text_type'] == 2)
                            <span class="layui-badge layui-bg-blue layui-user-tag">分享</span>
                        @elseif($data['text_type'] == 3)
                            <span class="layui-badge layui-bg-cyan layui-user-tag">建议</span>
                        @elseif($data['text_type'] == 4)
                            <span class="layui-badge layui-bg-badge layui-user-tag">悬赏</span>
                        @elseif($data['text_type'] == 5)
                            <span class="layui-badge layui-bg-gray layui-user-tag">讨论</span>
                        @endif
                    </span>
                </div>
            </blockquote>
        </fieldset>
    </div>

    <h1>{{$data['art_title']}}</h1>
    <br>
    <br>
    <div class="layui-col-xs12 layui-col-md8" style="">
        <div class="grid-demo grid-demo-bg1">
            {!! $data['art_content'] !!}
        </div>
    </div>


    <div class="layui-col-xs12 layui-col-md8" style="margin-top: 30px;">
        <fieldset class="layui-elem-field layui-field-title" style="margin-top: 20px;">
            <legend>评论内容</legend>
        </fieldset>
        <div class="grid-demo grid-demo-bg1">
            @foreach($comment as $k=>$v)
                {{--<fieldset class="layui-elem-field layui-field-title" style="margin-top: 10px;">--}}
                    {{--<legend></legend>--}}
                    {{--<blockquote class="layui-elem-quote" style="height: 70px;">--}}
                        {{--<div class="user_logo" >--}}
                            {{--<img src="{{$v['user_logo']}}" alt="" width="70px;" height="70px;">--}}
                        {{--</div>--}}
                        {{--<div class="user_two">--}}
                            {{--<span class="layui-user-tag" style="color: #BCD42A">{{$v['username']}}</span>--}}
                            {{--<span class="layui-user-tag" style="color: #a2afc8">{{$v['c_time']}}</span>--}}
                            {{--<br>--}}
                            {{--<br>--}}
                            {{--<font style="margin-left: 5px;">{{$v->reply}}</font>--}}
                        {{--</div>--}}
                    {{--</blockquote>--}}
                {{--</fieldset>--}}
                <fieldset class="layui-elem-field">
                    <legend>{{$v['username']}}</legend>
                    <div class="layui-field-box">
                        <div>

                            <span class="layui-user-tag" style="color: #BCD42A"></span>
                            <span class="layui-user-tag" style="color: #a2afc8">{{$v['c_time']}}</span>
                            <img src="{{$v['user_logo']}}" alt="" width="70px;" height="70px;" style="float: left;" >
                        </div>
                        <div style="margin-left: 80px;padding-top: 10px;">
                            <font style="margin-left: 5px;">{{$v->reply}}</font>
                        </div>

                    </div>
                </fieldset>


            @endforeach
        </div>
    </div>
    <div class="layui-col-xs12 layui-col-md8" style="height: 500px;margin-top: 30px;">
        <div class="grid-demo grid-demo-bg1">
                <fieldset class="layui-elem-field layui-field-title" style="margin-top: 20px;">
                    <legend>评论</legend>
                </fieldset>
                <div>
                    <form class="layui-form"> <!-- 提示：如果你不想用form，你可以换成div等任何一个普通元素 -->
                        <input type="hidden" name="art_id" value="{{$data['art_id']}}">

                        <textarea name="reply" id="reply" cols="105" rows="10"></textarea>
                        <div class="layui-form-item">
                            <div class="layui-input-block">
                                <button class="layui-btn layui-btn-normal" lay-submit lay-filter="reply_submit">立即提交</button>
                            </div>
                        </div>
                        <!-- 更多表单结构排版请移步文档左侧【页面元素-表单】一项阅览 -->
                    </form>
                </div>
        </div>

    </div>
@endsection


<script src="/js/jquery-3.2.1.min.js"></script>
<script src="/layui/layui.js"></script>
<script>
    $(function(){
        layui.use(['form','layedit'], function(){
            var form = layui.form;

            form.on('submit(reply_submit)', function(data){

                $.post(
                    '/index/article/comment',
                    data.field,
                    function (obj) {
                        layer.msg(obj.msg,{icon:obj.icon});
                        $('#reply').val('');
                    },
                    'json'
                )

                console.log(data.field) //当前容器的全部表单字段，名值对形式：{name: value}
                return false; //阻止表单跳转。如果需要表单跳转，去掉这段即可。
            });
            //各种基于事件的操作，下面会有进一步介绍
        });
    })

</script>
{{-------------------------------------------------content-----------------------------------------------------------}}
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="/layui/css/layui.css">
    <link rel="stylesheet" href="/css/blogs.css">
    <link rel="stylesheet" href="/css/page.css">
</head>
<body>
<div class="layui-container">
    {{--1--}}
    <div class="layui-row" style="position: sticky;top: 0;z-index: 999">
        <div class="layui-col-xs6 header">
            <div class="grid-demo grid-demo-bg1">
                <img src="/images/1001374.jpg" width="150px;" height="80px;" alt="" style="float: left">
            </div>
        </div>
        <div class="layui-col-xs6 header">
            <div class="grid-demo">
                <img src="/images/u=813955580,2345690509&fm=26&gp=0.png" class="layui-circle" width="80px;" height="80px;" alt="" style="float: right;padding-right: 5%" >
            </div>
        </div>
    </div>
    {{--2--}}
    <div class="layui-row"  style="padding-top: 10px;">
        <div class="layui-col-sm3" >
            <div class="grid-demo grid-demo-bg1 nav nav-checked">首页</div>
            <div class="grid-demo grid-demo-bg1 nav">提问</div>
            <div class="grid-demo grid-demo-bg1 nav">分享</div>
        </div>
        <div class="layui-col-sm3">
            <div class="grid-demo grid-demo-bg1 nav">资源</div>
            <div class="grid-demo grid-demo-bg1 nav">论坛</div>
            <div class="grid-demo grid-demo-bg1 nav">公告</div>
        </div>
        <div class="layui-col-sm3">

        </div>
        <div class="layui-col-sm3">
            <form class="layui-form" action="">
                <i class="layui-icon search-icon">&#xe615;</i>
                <input type="text" id="search" name="p" autocomplete="off" placeholder="站内搜索" class="layui-input">
            </form>
        </div>

    </div>

    {{--广告--}}
    <div class="layui-row" style="padding-top: 5px;margin-bottom: 10px;">
        <div class="layui-col-md6">
            <div class="grid-demo grid-demo-bg1">
                <img src="/images/1000305.jpg" class="g_img" alt="">
            </div>
        </div>
        <div class="layui-col-md6">
            <div class="grid-demo">
                <img src="/images/1000309.jpg" class="g_img" alt="">
            </div>
        </div>
    </div>
    <div class="layui-row">
        <div class="layui-col-xs6 layui-col-md4" style=" float: right">
            {{--商品推荐--}}
            @section('goods')
            <div class="grid-demo" style="height:150px;">
                <div><img src="/images/1000359.jpg" class="lb_img" alt=""></div>
            </div>
            @show
            {{--登陆注册--}}
            @if(!session('user_info.username') != null)
                <div class="grid-demo" style="height:320px;  margin-top: 5px;">
                <div class="layui-tab">
                    <ul class="layui-tab-title">
                        <li class="layui-this login-tab">登录</li>
                        <li class="login-tab" >注册</li>
                    </ul>
                    <div class="layui-tab-content">
                        <div class="layui-tab-item layui-show">
                            <form class="layui-form" action="#" method="post">
                                <div class="layui-form-item">
                                    <div class="layui-inline">
                                        <label class="layui-form-label">
                                            <i class="layui-icon" style="font-size: 24px;">&#xe66f;</i>
                                        </label>
                                        <div class="layui-input-inline">
                                            <input type="text" name="username" value="" placeholder="请输入用户名" lay-verify="required" autocomplete="off" class="layui-input">
                                        </div>
                                    </div>
                                    <div class="layui-inline">
                                        <label class="layui-form-label">
                                            <i class="layui-icon" style="font-size: 24px;">&#xe673;</i>
                                        </label>
                                        <div class="layui-input-inline">
                                            <input type="password" name="password" placeholder="请输入密码" lay-verify="required"  autocomplete="off" class="layui-input">
                                        </div>
                                    </div>
                                    <div class="layui-inline">
                                        <label class="layui-form-label">
                                            <i class="layui-icon" style="font-size: 24px;">&#xe679;</i>
                                        </label>
                                        <div class="layui-input-inline">
                                            <input type="text" name="code" placeholder="1+1+3+5=?" lay-verify="required"  autocomplete="off" class="layui-input">
                                        </div>
                                    </div>
                                    <div class="layui-inline">
                                        <label class="layui-form-label">
                                        </label>
                                        <div class="layui-form-item">
                                            <div class="layui-input-block">
                                                <button class="layui-btn layui-btn-sm layui-btn-normal" lay-submit  lay-filter="login">立即登录</button>
                                            </div>
                                        </div>
                                    </div>
                                    {{--第三方登录--}}
                                    <div class="layui-inline">
                                        <label class="layui-form-label"></label>
                                        <i class="layui-icon" style="font-size: 24px;">&#xe676;</i>
                                        <i class="layui-icon" style="padding-left: 20px;font-size: 24px;">&#xe677;</i>
                                        <i class="layui-icon" style="padding-left: 20px;font-size: 24px;">&#xe675;</i>

                                    </div>
                                </div>
                            </form>
                        </div>
                        {{--------------------------注册------------------------}}
                        <div class="layui-tab-item">
                            <form class="layui-form" action="">
                                <div class="layui-form-item">
                                    <div class="layui-inline">
                                        <label class="layui-form-label">
                                            <i class="layui-icon" style="font-size: 24px;">&#xe66f;</i>
                                        </label>
                                        <div class="layui-input-inline">
                                            <input type="text" name="username" placeholder="请输入用户名" lay-verify="required" autocomplete="off" class="layui-input">
                                        </div>
                                    </div>
                                    <div class="layui-inline">
                                        <label class="layui-form-label">
                                            <i class="layui-icon" style="font-size: 24px;">&#xe673;</i>
                                        </label>
                                        <div class="layui-input-inline">
                                            <input type="password" name="password" lay-verify="required" placeholder="请输入密码" lay-verify="required"  autocomplete="off" class="layui-input">
                                        </div>
                                    </div>
                                    <div class="layui-form-item">
                                        <label class="layui-form-label">
                                            <i class="layui-icon" style="font-size: 24px;">&#xe678;</i>
                                        </label>
                                        <div class="layui-input-inline">
                                            <input type="tel" id="user_phone" name="user_phone" lay-verify="phone|required"  placeholder="请输入手机号" autocomplete="off" class="layui-input">
                                        </div>
                                        <div class="layui-form-mid layui-word-aux">
                                            <i class="layui-icon click_send_phone" style="font-size: 24px;">&#xe602;</i>
                                        </div>
                                    </div>

                                    <div class="layui-inline">
                                        <label class="layui-form-label">
                                            <i class="layui-icon" style="font-size: 24px;">&#xe679;</i>
                                        </label>
                                        <div class="layui-input-inline">
                                            <input type="text" name="code" lay-verify="required" placeholder="验证码" lay-verify="required"  autocomplete="off" class="layui-input">
                                        </div>
                                    </div>

                                    <div class="layui-inline">
                                        <label class="layui-form-label">
                                        </label>
                                        <div class="layui-form-item">
                                            <div class="layui-input-block">
                                                <button class="layui-btn layui-btn-sm layui-btn-normal" lay-submit lay-filter="reg">立即注册</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @else
                <div class="grid-demo" style="height:320px;  margin-top: 5px;">
                </div>
            @endif
            {{--活跃用户--}}
            @section('hot_user')
            <div class="grid-demo" style="height:500px;">

                <table style="width: 100%;height: 400px;">

                    <fieldset class="layui-elem-field layui-field-title">
                        <legend>活跃用户周榜</legend>
                    </fieldset>
                    <tr>
                        <td><img src="/images/bg.jpg" alt="" width="90px;" height="90px;"></td>
                        <td><img src="/images/bg.jpg" alt="" width="90px;" height="90px;"></td>
                        <td><img src="/images/bg.jpg" alt="" width="90px;" height="90px;"></td>
                        <td><img src="/images/bg.jpg" alt="" width="90px;" height="90px;"></td>
                    </tr>
                    <tr>
                        <td><img src="/images/bg.jpg" alt="" width="90px;" height="90px;"></td>
                        <td><img src="/images/bg.jpg" alt="" width="90px;" height="90px;"></td>
                        <td><img src="/images/bg.jpg" alt="" width="90px;" height="90px;"></td>
                        <td><img src="/images/bg.jpg" alt="" width="90px;" height="90px;"></td>
                    </tr>
                    <tr>
                        <td><img src="/images/bg.jpg" alt="" width="90px;" height="90px;"></td>
                        <td><img src="/images/bg.jpg" alt="" width="90px;" height="90px;"></td>
                        <td><img src="/images/bg.jpg" alt="" width="90px;" height="90px;"></td>
                        <td><img src="/images/bg.jpg" alt="" width="90px;" height="90px;"></td>
                    </tr>
                    <tr>
                        <td><img src="/images/bg.jpg" alt="" width="90px;" height="90px;"></td>
                        <td><img src="/images/bg.jpg" alt="" width="90px;" height="90px;"></td>
                        <td><img src="/images/bg.jpg" alt="" width="90px;" height="90px;"></td>
                        <td><img src="/images/bg.jpg" alt="" width="90px;" height="90px;"></td>
                    </tr>

                </table>
            </div>
            @show
            {{--本周热门--}}
            <div class="grid-demo" style="height:600px;">
                <fieldset class="layui-elem-field layui-field-title">
                    <legend>本周热度排行</legend>
                </fieldset>
                <ul class="layui-timeline">
                    <li class="layui-timeline-item">
                        <i class="layui-icon layui-timeline-axis"></i>
                        <div class="layui-timeline-content layui-text">
                            <div class="layui-timeline-title" >
                                <p  class="line-limit-length" >2018年，layui 5.0 发布2018年，layui 5.0 发
                                    <i class="layui-icon" style="color: red;float: right;">&#xe756;
                                        <i style="font-size: 12px;color: #a2afc8;"> 201</i>
                                    </i>
                                </p>

                            </div>
                        </div>
                    </li>
                    <li class="layui-timeline-item">
                        <i class="layui-icon layui-timeline-axis"></i>
                        <div class="layui-timeline-content layui-text">
                            <div class="layui-timeline-title">2018年，layui 5.0 发布。并发展成为中国
                                <i class="layui-icon" style="float: right;color: red;">&#xe756;
                                    <i style="font-size: 12px;color: #a2afc8;"> 453</i>
                                </i>
                            </div>
                        </div>
                    </li>
                    <li class="layui-timeline-item">
                        <i class="layui-icon layui-timeline-axis"></i>
                        <div class="layui-timeline-content layui-text">
                            <div class="layui-timeline-title">2018年，layui 5.0 发布。并发展成为中国
                                <i class="layui-icon" style="float: right;color: red;">&#xe756;
                                    <i style="font-size: 12px;color: #a2afc8;"> 140</i>
                                </i>
                            </div>
                        </div>
                    </li>
                    <li class="layui-timeline-item">
                        <i class="layui-icon layui-timeline-axis"></i>
                        <div class="layui-timeline-content layui-text">
                            <div class="layui-timeline-title">2018年，layui 5.0 发布。并发展成为中国
                                <i class="layui-icon" style="float: right;color: red;">&#xe756;
                                    <i style="font-size: 12px;color: #a2afc8;"> 132</i>
                                </i>
                            </div>
                        </div>
                    </li>
                    <li class="layui-timeline-item">
                        <i class="layui-icon layui-timeline-axis"></i>
                        <div class="layui-timeline-content layui-text">
                            <div class="layui-timeline-title">2018年，layui 5.0 发布。并发展成为中国
                                <i class="layui-icon" style="float: right;color: red;">&#xe756;
                                    <i style="font-size: 12px;color: #a2afc8;"> 105</i>
                                </i>
                            </div>
                        </div>
                    </li>
                    <li class="layui-timeline-item">
                        <i class="layui-icon layui-timeline-axis"></i>
                        <div class="layui-timeline-content layui-text">
                            <div class="layui-timeline-title">2018年，layui 5.0 发布。并发展成为中国
                                <i class="layui-icon" style="float: right;color: red;">&#xe756;
                                    <i style="font-size: 12px;color: #a2afc8;"> 100</i>
                                </i>
                            </div>
                        </div>
                    </li>
                    <li class="layui-timeline-item">
                        <i class="layui-icon layui-timeline-axis"></i>
                        <div class="layui-timeline-content layui-text">
                            <div class="layui-timeline-title">2018年，layui 5.0 发布。并发展成为中国
                                <i class="layui-icon" style="float: right;color: red;">&#xe756;
                                    <i style="font-size: 12px;color: #a2afc8;"> 70</i>
                                </i>
                            </div>
                        </div>
                    </li>
                    <li class="layui-timeline-item">
                        <i class="layui-icon layui-timeline-axis"></i>
                        <div class="layui-timeline-content layui-text">
                            <div class="layui-timeline-title">2018年，layui 5.0 发布。并发展成为中国
                                <i class="layui-icon" style="float: right;color: red;">&#xe756;
                                    <i style="font-size: 12px;color: #a2afc8;"> 53</i>
                                </i>
                            </div>
                        </div>
                    </li>
                    <li class="layui-timeline-item">
                        <i class="layui-icon layui-timeline-axis"></i>
                        <div class="layui-timeline-content layui-text">
                            <div class="layui-timeline-title">2018年，layui 5.0 发布。并发展成为中国
                                <i class="layui-icon" style="float: right;color: red;">&#xe756;
                                    <i style="font-size: 12px;color: #a2afc8;"> 50</i>
                                </i>
                            </div>
                        </div>
                    </li>
                    <li class="layui-timeline-item">
                        <i class="layui-icon layui-timeline-axis"></i>
                        <div class="layui-timeline-content layui-text">
                            <div class="layui-timeline-title">2018年，layui 5.0 发布。并发展成为中国
                                <i class="layui-icon" style="float: right;color: red;">&#xe756;
                                    <i style="font-size: 12px;color: #a2afc8;"> 20</i>
                                </i>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
            {{--友情链接--}}
            @section('amity')
            <div class="grid-demo" style="height:500px;">
                <fieldset class="layui-elem-field layui-field-title">
                    <legend>友情链接</legend>
                </fieldset>
                <img src="/images/1000360.jpg" class="g_img" alt="">
                <img src="/images/1000562.jpg" class="g_img" alt="">
                <img src="/images/1001374.jpg" class="g_img" alt="">
                <img src="/images/1001603.jpg" class="g_img" alt="">
            </div>
            @show
            {{--二维码--}}
            @section('QR_code')
            <div class="grid-demo" style="height:350px;">
                <img src="/images/baiqi.gif" width="300px" height="300px" style="margin-top:5%;margin-left: 10%" alt="">
                <div class="layui-form-mid layui-word-aux" style="margin-left: 20%;">扫描二维码关注公主号,了解更多资讯</div>
            </div>
            @show
        </div>

        {{--轮播图--}}
        @section('Carousel')
        <div class="layui-col-xs12 layui-col-md8" style="height: 150px;float: left;">
            <div class="grid-demo grid-demo-bg1">
                <div class="layui-carousel" id="test1" lay-filter="test1">
                    <div carousel-item="">
                        <div><img src="/images/5d8b082b861f9.jpg" class="lb_img" alt=""></div>
                        <div><img src="/images/5d8b082ce2abb.jpg" class="lb_img" alt=""></div>
                    </div>
                </div>
            </div>
        </div>
        @show

        @section('content')

        @show
    </div>

    @section('button_img')
    <div class="layui-row layui-col-space1">
        <div class="layui-col-md3 bottom">
            <div class="grid-demo grid-demo-bg1"><img src="/images/5d8b082b861f9.jpg" class="g_img" alt=""></div>
        </div>
        <div class="layui-col-md3 bottom">
            <div class="grid-demo"><img src="/images/5d8b082b861f9.jpg" class="g_img" alt=""></div>
        </div>
        <div class="layui-col-md3 bottom">
            <div class="grid-demo grid-demo-bg1"><img src="/images/5d8b082b861f9.jpg" class="g_img" alt=""></div>
        </div>
        <div class="layui-col-md3 bottom">
            <div class="grid-demo"><img src="/images/5d8b082b861f9.jpg" class="g_img" alt=""></div>
        </div>
    </div>
    @show
    <div class="layui-row">
        <div class="layui-col-xs6 layui-col-md12" style="height: 50px;margin-top:30px;text-align: center">
            <div class="grid-demo grid-demo-bg2">Md 社区 2019 © lmd998.com</div>
        </div>
    </div>
</div>
</body>
</html>


<script src="/js/jquery-3.2.1.min.js"></script>
<script src="/layui/layui.js" charset="utf-8"></script>

<script>
    //注意：选项卡 依赖 element 模块，否则无法进行功能性操作
    layui.use(['element','form','layer'], function(){
        var element = layui.element;
        var form = layui.form;
        var layer = layui.layer;


        form.on('submit(login)', function(data){
            var index = layer.load(1); //风格1的加载
            $.post(
                '/index/loginDo',
                data.field,
                function (obj) {
                    layer.msg(obj.msg,{icon:obj.icon,time:2000});
                    layer.close(index); //如果设定了yes回调，需进行手工关闭
                },
                'json'
            )

            return false; //阻止表单跳转。如果需要表单跳转，去掉这段即可。
        });
        form.on('submit(reg)', function(data){
            var index = layer.load(1); //风格1的加载
            $.post(
                '/index/regDo',
                data.field,
                function (obj) {
                    layer.msg(obj.msg,{icon:obj.icon,time:2000});
                    layer.close(index); //如果设定了yes回调，需进行手工关闭
                },
                'json'
            )

            return false; //阻止表单跳转。如果需要表单跳转，去掉这段即可。
        });

        // 点击发送手机号
        $('.click_send_phone').click(function () {
            var user_phone = $('#user_phone').val();
            console.log(user_phone)
            if(user_phone == ''){
                layer.msg('请输入手机号',{icon:7});
                return false;
            }
            if (!(/^((\d{3}-\d{8}|\d{4}-\d{7,8})|(1[3|5|7|8][0-9]{9}))$/.test(user_phone))) {
                layer.msg('手机号填写的格式不对,请正确填写',{icon:7});
                return false;
            }

            $.post(
                '/sendPhoneCode',
                {phone:user_phone,type:1},
                function (res) {
                    layer.msg(res.msg,{icon:res.icon,time:1500},function () {
                        if (res.code == 200){
                            $(this).hide();
                        }
                    });
                },
                'json'
            )

        })

        //…
    });
</script>

<script>
    layui.use(['carousel', 'form'], function() {
        var carousel = layui.carousel
            , form = layui.form;
        //常规轮播
        carousel.render({
            elem: '#test1'
            , arrow: 'always'
            ,height: '150px'
            ,width:'100%'
        });
    });
</script>

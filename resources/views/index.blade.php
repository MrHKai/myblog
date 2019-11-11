<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="/layui/css/layui.css">
    <link rel="stylesheet" href="/css/blogs.css">
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
            <div class="grid-demo grid-demo-bg1 nav">首页</div>
            <div class="grid-demo grid-demo-bg1 nav">欧克</div>
            <div class="grid-demo grid-demo-bg1 nav">萨安</div>
        </div>
        <div class="layui-col-sm3">
            <div class="grid-demo grid-demo-bg1 nav">一啞</div>
            <div class="grid-demo grid-demo-bg1 nav">哦那</div>
            <div class="grid-demo grid-demo-bg1 nav">安心</div>
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
        <div class="layui-col-xs6 layui-col-md4" style="height: 2000px; float: right">
            {{--商品推荐--}}
            <div class="grid-demo" style="height:150px;">
                <div><img src="/images/1000359.jpg" class="lb_img" alt=""></div>
            </div>
            {{--登陆注册--}}
            <div class="grid-demo" style="height:320px;  margin-top: 5px;">
                    <div class="layui-tab">
                        <ul class="layui-tab-title">
                            <li class="layui-this login-tab">登录</li>
                            <li class="login-tab" >注册</li>
                        </ul>
                        <div class="layui-tab-content">
                            <div class="layui-tab-item layui-show">
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
                                                <input type="password" name="password" placeholder="请输入密码" lay-verify="required"  autocomplete="off" class="layui-input">
                                            </div>
                                        </div>
                                        <div class="layui-inline">
                                            <label class="layui-form-label">
                                            </label>
                                            <div class="layui-form-item">
                                                <div class="layui-input-block">
                                                    <button class="layui-btn layui-btn-sm layui-btn-normal" lay-submit lay-filter="login">立即登录</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="layui-inline">
                                            <label class="layui-form-label"></label>
                                            <i class="layui-icon" style="font-size: 24px;">&#xe676;</i>
                                            <i class="layui-icon" style="padding-left: 20px;font-size: 24px;">&#xe677;</i>
                                            <i class="layui-icon" style="padding-left: 20px;font-size: 24px;">&#xe675;</i>

                                        </div>
                                    </div>
                                </form>
                            </div>
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
                                                <input type="password" name="password" lay-verify="pass" placeholder="请输入密码" lay-verify="required"  autocomplete="off" class="layui-input">
                                            </div>
                                        </div>
                                        <div class="layui-form-item">
                                            <label class="layui-form-label">
                                                <i class="layui-icon" style="font-size: 24px;">&#xe678;</i>
                                            </label>
                                            <div class="layui-input-inline">
                                                <input type="tel" name="password" lay-verify="phone"  placeholder="请输入手机号" autocomplete="off" class="layui-input">
                                            </div>
                                            <div class="layui-form-mid layui-word-aux">
                                                <i class="layui-icon" style="font-size: 24px;">&#xe602;</i>
                                            </div>
                                        </div>

                                        <div class="layui-inline">
                                            <label class="layui-form-label">
                                                <i class="layui-icon" style="font-size: 24px;">&#xe679;</i>
                                            </label>
                                            <div class="layui-input-inline">
                                                <input type="password" name="password" lay-verify="pass" placeholder="验证码" lay-verify="required"  autocomplete="off" class="layui-input">
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
            {{--活跃用户--}}
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
            <div class="grid-demo" style="height:500px;">
                <fieldset class="layui-elem-field layui-field-title">
                    <legend>友情链接</legend>
                </fieldset>
                <img src="/images/1000360.jpg" class="g_img" alt="">
                <img src="/images/1000562.jpg" class="g_img" alt="">
                <img src="/images/1001374.jpg" class="g_img" alt="">
                <img src="/images/1001603.jpg" class="g_img" alt="">
            </div>
            {{--二维码--}}
            <div class="grid-demo" style="height:350px;">
                <img src="/images/baiqi.gif" width="300px" height="300px" style="margin-top:5%;margin-left: 10%" alt="">
                <div class="layui-form-mid layui-word-aux" style="margin-left: 20%;">扫描二维码关注公主号,了解更多资讯</div>
            </div>
        </div>

        {{--轮播图--}}
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

        <div class="layui-col-xs12 layui-col-md8 layui-col-md8-blogs">
            <div class="grid-demo grid-demo-bg1">
                <div class="user_logo" >
                    <img src="/images/bg.jpg" alt="" width="70px;" height="70px;" style="margin-top: 20%">
                </div>
                <div class="user_two">
                    <span class="layui-badge layui-bg-orange layui-user-tag">提问</span>
                    <span class="layui-user-tag">文章标题文章标题文章标题</span>
                    <span class="layui-badge layui-user-tag-right">精贴</span>

                </div>
                <div class="user_tre">
                    <span class="user-info">用户名六个字</span>
                    <span class="user-info">1小时前</span>
                    <span class="user-info layui-user-info-right"><i class="layui-icon">&#xe705;</i>100</span>

                </div>
            </div>
        </div>
        <div class="layui-col-xs12 layui-col-md8 layui-col-md8-blogs">
            <div class="grid-demo grid-demo-bg1">
                <div class="user_logo" >
                    <img src="/images/bg.jpg" alt="" width="70px;" height="70px;" style="margin-top: 20%">
                </div>
                <div class="user_two">
                    <span class="layui-badge layui-bg-orange layui-user-tag">提问</span>
                    <span class="layui-user-tag">文章标题文章标题文章标题</span>
                    <span class="layui-badge layui-user-tag-right">精贴</span>

                </div>
                <div class="user_tre">
                    <span class="user-info">用户名六个字</span>
                    <span class="user-info">1小时前</span>
                    <span class="user-info layui-user-info-right"><i class="layui-icon">&#xe705;</i>100</span>

                </div>
            </div>
        </div>
        <div class="layui-col-xs12 layui-col-md8 layui-col-md8-blogs">
            <div class="grid-demo grid-demo-bg1">
                <div class="user_logo" >
                    <img src="/images/bg.jpg" alt="" width="70px;" height="70px;" style="margin-top: 20%">
                </div>
                <div class="user_two">
                    <span class="layui-badge layui-bg-orange layui-user-tag">提问</span>
                    <span class="layui-user-tag">文章标题文章标题文章标题</span>
                    <span class="layui-badge layui-user-tag-right">精贴</span>

                </div>
                <div class="user_tre">
                    <span class="user-info">用户名六个字</span>
                    <span class="user-info">1小时前</span>
                    <span class="user-info layui-user-info-right"><i class="layui-icon">&#xe705;</i>100</span>

                </div>
            </div>
        </div>
        <div class="layui-col-xs12 layui-col-md8 layui-col-md8-blogs">
            <div class="grid-demo grid-demo-bg1">
                <div class="user_logo" >
                    <img src="/images/bg.jpg" alt="" width="70px;" height="70px;" style="margin-top: 20%">
                </div>
                <div class="user_two">
                    <span class="layui-badge layui-bg-orange layui-user-tag">提问</span>
                    <span class="layui-user-tag">文章标题文章标题文章标题</span>
                    <span class="layui-badge layui-user-tag-right">精贴</span>

                </div>
                <div class="user_tre">
                    <span class="user-info">用户名六个字</span>
                    <span class="user-info">1小时前</span>
                    <span class="user-info layui-user-info-right"><i class="layui-icon">&#xe705;</i>100</span>

                </div>
            </div>
        </div>
        <div class="layui-col-xs12 layui-col-md8 layui-col-md8-blogs">
            <div class="grid-demo grid-demo-bg1">
                <div class="user_logo" >
                    <img src="/images/bg.jpg" alt="" width="70px;" height="70px;" style="margin-top: 20%">
                </div>
                <div class="user_two">
                    <span class="layui-badge layui-bg-orange layui-user-tag">提问</span>
                    <span class="layui-user-tag">文章标题文章标题文章标题</span>
                    <span class="layui-badge layui-user-tag-right">精贴</span>

                </div>
                <div class="user_tre">
                    <span class="user-info">用户名六个字</span>
                    <span class="user-info">1小时前</span>
                    <span class="user-info layui-user-info-right"><i class="layui-icon">&#xe705;</i>100</span>

                </div>
            </div>
        </div>
        <div class="layui-col-xs12 layui-col-md8 layui-col-md8-blogs">
            <div class="grid-demo grid-demo-bg1">
                <div class="user_logo" >
                    <img src="/images/bg.jpg" alt="" width="70px;" height="70px;" style="margin-top: 20%">
                </div>
                <div class="user_two">
                    <span class="layui-badge layui-bg-orange layui-user-tag">提问</span>
                    <span class="layui-user-tag">文章标题文章标题文章标题</span>
                    <span class="layui-badge layui-user-tag-right">精贴</span>

                </div>
                <div class="user_tre">
                    <span class="user-info">用户名六个字</span>
                    <span class="user-info">1小时前</span>
                    <span class="user-info layui-user-info-right"><i class="layui-icon">&#xe705;</i>100</span>

                </div>
            </div>
        </div>
        <div class="layui-col-xs12 layui-col-md8 layui-col-md8-blogs">
            <div class="grid-demo grid-demo-bg1">
                <div class="user_logo" >
                    <img src="/images/bg.jpg" alt="" width="70px;" height="70px;" style="margin-top: 20%">
                </div>
                <div class="user_two">
                    <span class="layui-badge layui-bg-orange layui-user-tag">提问</span>
                    <span class="layui-user-tag">文章标题文章标题文章标题</span>
                    <span class="layui-badge layui-user-tag-right">精贴</span>

                </div>
                <div class="user_tre">
                    <span class="user-info">用户名六个字</span>
                    <span class="user-info">1小时前</span>
                    <span class="user-info layui-user-info-right"><i class="layui-icon">&#xe705;</i>100</span>

                </div>
            </div>
        </div>
        <div class="layui-col-xs12 layui-col-md8 layui-col-md8-blogs">
            <div class="grid-demo grid-demo-bg1">
                <div class="user_logo" >
                    <img src="/images/bg.jpg" alt="" width="70px;" height="70px;" style="margin-top: 20%">
                </div>
                <div class="user_two">
                    <span class="layui-badge layui-bg-orange layui-user-tag">提问</span>
                    <span class="layui-user-tag">文章标题文章标题文章标题</span>
                    <span class="layui-badge layui-user-tag-right">精贴</span>

                </div>
                <div class="user_tre">
                    <span class="user-info">用户名六个字</span>
                    <span class="user-info">1小时前</span>
                    <span class="user-info layui-user-info-right"><i class="layui-icon">&#xe705;</i>100</span>

                </div>
            </div>
        </div>
        <div class="layui-col-xs12 layui-col-md8 layui-col-md8-blogs">
            <div class="grid-demo grid-demo-bg1">
                <div class="user_logo" >
                    <img src="/images/bg.jpg" alt="" width="70px;" height="70px;" style="margin-top: 20%">
                </div>
                <div class="user_two">
                    <span class="layui-badge layui-bg-orange layui-user-tag">提问</span>
                    <span class="layui-user-tag">文章标题文章标题文章标题</span>
                    <span class="layui-badge layui-user-tag-right">精贴</span>

                </div>
                <div class="user_tre">
                    <span class="user-info">用户名六个字</span>
                    <span class="user-info">1小时前</span>
                    <span class="user-info layui-user-info-right"><i class="layui-icon">&#xe705;</i>100</span>

                </div>
            </div>
        </div>
        <div class="layui-col-xs12 layui-col-md8 layui-col-md8-blogs">
            <div class="grid-demo grid-demo-bg1">
                <div class="user_logo" >
                    <img src="/images/bg.jpg" alt="" width="70px;" height="70px;" style="margin-top: 20%">
                </div>
                <div class="user_two">
                    <span class="layui-badge layui-bg-orange layui-user-tag">提问</span>
                    <span class="layui-user-tag">文章标题文章标题文章标题</span>
                    <span class="layui-badge layui-user-tag-right">精贴</span>

                </div>
                <div class="user_tre">
                    <span class="user-info">用户名六个字</span>
                    <span class="user-info">1小时前</span>
                    <span class="user-info layui-user-info-right"><i class="layui-icon">&#xe705;</i>100</span>

                </div>
            </div>
        </div>
        <div class="layui-col-xs12 layui-col-md8 layui-col-md8-blogs">
            <div class="grid-demo grid-demo-bg1">
                <div class="user_logo" >
                    <img src="/images/bg.jpg" alt="" width="70px;" height="70px;" style="margin-top: 20%">
                </div>
                <div class="user_two">
                    <span class="layui-badge layui-bg-orange layui-user-tag">提问</span>
                    <span class="layui-user-tag">文章标题文章标题文章标题</span>
                    <span class="layui-badge layui-user-tag-right">精贴</span>

                </div>
                <div class="user_tre">
                    <span class="user-info">用户名六个字</span>
                    <span class="user-info">1小时前</span>
                    <span class="user-info layui-user-info-right"><i class="layui-icon">&#xe705;</i>100</span>

                </div>
            </div>
        </div>
        <div class="layui-col-xs12 layui-col-md8 layui-col-md8-blogs">
            <div class="grid-demo grid-demo-bg1">
                <div class="user_logo" >
                    <img src="/images/bg.jpg" alt="" width="70px;" height="70px;" style="margin-top: 20%">
                </div>
                <div class="user_two">
                    <span class="layui-badge layui-bg-orange layui-user-tag">提问</span>
                    <span class="layui-user-tag">文章标题文章标题文章标题</span>
                    <span class="layui-badge layui-user-tag-right">精贴</span>

                </div>
                <div class="user_tre">
                    <span class="user-info">用户名六个字</span>
                    <span class="user-info">1小时前</span>
                    <span class="user-info layui-user-info-right"><i class="layui-icon">&#xe705;</i>100</span>

                </div>
            </div>
        </div>
        <div class="layui-col-xs12 layui-col-md8 layui-col-md8-blogs">
            <div class="grid-demo grid-demo-bg1">
                <div class="user_logo" >
                    <img src="/images/bg.jpg" alt="" width="70px;" height="70px;" style="margin-top: 20%">
                </div>
                <div class="user_two">
                    <span class="layui-badge layui-bg-orange layui-user-tag">提问</span>
                    <span class="layui-user-tag">文章标题文章标题文章标题</span>
                    <span class="layui-badge layui-user-tag-right">精贴</span>

                </div>
                <div class="user_tre">
                    <span class="user-info">用户名六个字</span>
                    <span class="user-info">1小时前</span>
                    <span class="user-info layui-user-info-right"><i class="layui-icon">&#xe705;</i>100</span>

                </div>
            </div>
        </div>
        <div class="layui-col-xs12 layui-col-md8 layui-col-md8-blogs">
            <div class="grid-demo grid-demo-bg1">
                <div class="user_logo" >
                    <img src="/images/bg.jpg" alt="" width="70px;" height="70px;" style="margin-top: 20%">
                </div>
                <div class="user_two">
                    <span class="layui-badge layui-bg-orange layui-user-tag">提问</span>
                    <span class="layui-user-tag">文章标题文章标题文章标题</span>
                    <span class="layui-badge layui-user-tag-right">精贴</span>

                </div>
                <div class="user_tre">
                    <span class="user-info">用户名六个字</span>
                    <span class="user-info">1小时前</span>
                    <span class="user-info layui-user-info-right"><i class="layui-icon">&#xe705;</i>100</span>

                </div>
            </div>
        </div>
        <div class="layui-col-xs12 layui-col-md8 layui-col-md8-blogs">
            <div class="grid-demo grid-demo-bg1">
                <div class="user_logo" >
                    <img src="/images/bg.jpg" alt="" width="70px;" height="70px;" style="margin-top: 20%">
                </div>
                <div class="user_two">
                    <span class="layui-badge layui-bg-orange layui-user-tag">提问</span>
                    <span class="layui-user-tag">文章标题文章标题文章标题</span>
                    <span class="layui-badge layui-user-tag-right">精贴</span>

                </div>
                <div class="user_tre">
                    <span class="user-info">用户名六个字</span>
                    <span class="user-info">1小时前</span>
                    <span class="user-info layui-user-info-right"><i class="layui-icon">&#xe705;</i>100</span>

                </div>
            </div>
        </div>
        <div class="layui-col-xs12 layui-col-md8 layui-col-md8-blogs">
            <div class="grid-demo grid-demo-bg1">
                <div class="user_logo" >
                    <img src="/images/bg.jpg" alt="" width="70px;" height="70px;" style="margin-top: 20%">
                </div>
                <div class="user_two">
                    <span class="layui-badge layui-bg-orange layui-user-tag">提问</span>
                    <span class="layui-user-tag">文章标题文章标题文章标题</span>
                    <span class="layui-badge layui-user-tag-right">精贴</span>

                </div>
                <div class="user_tre">
                    <span class="user-info">用户名六个字</span>
                    <span class="user-info">1小时前</span>
                    <span class="user-info layui-user-info-right"><i class="layui-icon">&#xe705;</i>100</span>

                </div>
            </div>
        </div>
        <div class="layui-col-xs12 layui-col-md8 layui-col-md8-blogs">
            <div class="grid-demo grid-demo-bg1">
                <div class="user_logo" >
                    <img src="/images/bg.jpg" alt="" width="70px;" height="70px;" style="margin-top: 20%">
                </div>
                <div class="user_two">
                    <span class="layui-badge layui-bg-orange layui-user-tag">提问</span>
                    <span class="layui-user-tag">文章标题文章标题文章标题</span>
                    <span class="layui-badge layui-user-tag-right">精贴</span>

                </div>
                <div class="user_tre">
                    <span class="user-info">用户名六个字</span>
                    <span class="user-info">1小时前</span>
                    <span class="user-info layui-user-info-right"><i class="layui-icon">&#xe705;</i>100</span>

                </div>
            </div>
        </div>
        <div class="layui-col-xs12 layui-col-md8 layui-col-md8-blogs">
            <div class="grid-demo grid-demo-bg1">
                <div class="user_logo" >
                    <img src="/images/bg.jpg" alt="" width="70px;" height="70px;" style="margin-top: 20%">
                </div>
                <div class="user_two">
                    <span class="layui-badge layui-bg-orange layui-user-tag">提问</span>
                    <span class="layui-user-tag">文章标题文章标题文章标题</span>
                    <span class="layui-badge layui-user-tag-right">精贴</span>

                </div>
                <div class="user_tre">
                    <span class="user-info">用户名六个字</span>
                    <span class="user-info">1小时前</span>
                    <span class="user-info layui-user-info-right"><i class="layui-icon">&#xe705;</i>100</span>

                </div>
            </div>
        </div>
        <div class="layui-col-xs12 layui-col-md8 layui-col-md8-blogs">
            <div class="grid-demo grid-demo-bg1">
                <div class="user_logo" >
                    <img src="/images/bg.jpg" alt="" width="70px;" height="70px;" style="margin-top: 20%">
                </div>
                <div class="user_two">
                    <span class="layui-badge layui-bg-orange layui-user-tag">提问</span>
                    <span class="layui-user-tag">文章标题文章标题文章标题</span>
                    <span class="layui-badge layui-user-tag-right">精贴</span>

                </div>
                <div class="user_tre">
                    <span class="user-info">用户名六个字</span>
                    <span class="user-info">1小时前</span>
                    <span class="user-info layui-user-info-right"><i class="layui-icon">&#xe705;</i>100</span>

                </div>
            </div>
        </div>
        <div class="layui-col-xs12 layui-col-md8 layui-col-md8-blogs">
            <div class="grid-demo grid-demo-bg1">
                <div class="user_logo" >
                    <img src="/images/bg.jpg" alt="" width="70px;" height="70px;" style="margin-top: 20%">
                </div>
                <div class="user_two">
                    <span class="layui-badge layui-bg-orange layui-user-tag">提问</span>
                    <span class="layui-user-tag">文章标题文章标题文章标题</span>
                    <span class="layui-badge layui-user-tag-right">精贴</span>

                </div>
                <div class="user_tre">
                    <span class="user-info">用户名六个字</span>
                    <span class="user-info">1小时前</span>
                    <span class="user-info layui-user-info-right"><i class="layui-icon">&#xe705;</i>100</span>

                </div>
            </div>
        </div>
        <div class="layui-col-xs12 layui-col-md8 layui-col-md8-blogs">
            <div class="grid-demo grid-demo-bg1">
                <div class="user_logo" >
                    <img src="/images/bg.jpg" alt="" width="70px;" height="70px;" style="margin-top: 20%">
                </div>
                <div class="user_two">
                    <span class="layui-badge layui-bg-orange layui-user-tag">提问</span>
                    <span class="layui-user-tag">文章标题文章标题文章标题</span>
                    <span class="layui-badge layui-user-tag-right">精贴</span>

                </div>
                <div class="user_tre">
                    <span class="user-info">用户名六个字</span>
                    <span class="user-info">1小时前</span>
                    <span class="user-info layui-user-info-right"><i class="layui-icon">&#xe705;</i>100</span>

                </div>
            </div>
        </div>
        <div class="layui-col-xs12 layui-col-md8 layui-col-md8-blogs">
            <div class="grid-demo grid-demo-bg1">
                <div class="user_logo" >
                    <img src="/images/bg.jpg" alt="" width="70px;" height="70px;" style="margin-top: 20%">
                </div>
                <div class="user_two">
                    <span class="layui-badge layui-bg-orange layui-user-tag">提问</span>
                    <span class="layui-user-tag">文章标题文章标题文章标题</span>
                    <span class="layui-badge layui-user-tag-right">精贴</span>

                </div>
                <div class="user_tre">
                    <span class="user-info">用户名六个字</span>
                    <span class="user-info">1小时前</span>
                    <span class="user-info layui-user-info-right"><i class="layui-icon">&#xe705;</i>100</span>

                </div>
            </div>
        </div>
    </div>

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

    <div class="layui-row">
        <div class="layui-col-xs6 layui-col-md12" style="height: 50px;margin-top:30px;text-align: center">
            <div class="grid-demo grid-demo-bg2">Md 社区 2019 © lmd998.com</div>
        </div>
    </div>
</div>
</body>
</html>
<script src="/layui/layui.js" charset="utf-8"></script>
<!-- 注意：如果你直接复制所有代码到本地，上述js路径需要改成你本地的 -->

<script>
    //注意：选项卡 依赖 element 模块，否则无法进行功能性操作
    layui.use('element', function(){
        var element = layui.element;

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

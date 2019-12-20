@section('html')
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title> @yield('title')</title>
    <link rel="stylesheet" href="/layui/css/layui.css">
    <script src="/js/jquery-3.2.1.min.js"></script>
    <script src="/layui/layui.js"></script>
</head>
<body class="layui-layout-body">
<div class="layui-layout layui-layout-admin">
@show
    @section('head')
    <div class="layui-header bg-color">
        <div class="layui-logo">后台管理</div>
        <!-- 头部区域（可配合layui已有的水平导航） -->
        <ul class="layui-nav layui-layout-left">
            <li class="layui-nav-item"><a href="/admin">首页</a></li>
            <li class="layui-nav-item"><a href="">商品管理</a></li>
            <li class="layui-nav-item"><a href="">用户</a></li>
            <li class="layui-nav-item">
                <a href="javascript:;">其它系统</a>
                <dl class="layui-nav-child">
                    <dd><a href="">邮件管理</a></dd>
                    <dd><a href="">消息管理</a></dd>
                    <dd><a href="">授权管理</a></dd>
                </dl>
            </li>
        </ul>

        <ul class="layui-nav layui-layout-right">
            <li class="layui-nav-item">
                <a href="javascript:;">
                    <img src="http://t.cn/RCzsdCq" class="layui-nav-img">
                    贤心
                </a>
                <dl class="layui-nav-child">
                    <dd><a href="">基本资料</a></dd>
                    <dd><a href="">安全设置</a></dd>
                </dl>
            </li>
            <li class="layui-nav-item"><a href="">退了</a></li>
            <li class="layui-nav-item">
                <input type="hidden" name="color" value="" id="test-all-input">
                <div id="test-all">颜色</div>
            </li>
        </ul>

    </div>
    @show

    @section('left')
    <div class="layui-side layui-bg-black">
        <div class="layui-side-scroll bg-color">
            <!-- 左侧导航区域 -->
            <ul class="layui-nav layui-nav-tree bg-color"  lay-filter="test">
                <li class="layui-nav-item">
                    <a href="javascript:;">网站管理员</a>
                    <dl class="layui-nav-child">
                        <dd><a href="">基本设置</a></dd>
                        <dd><a href="">权限组</a></dd>
                    </dl>
                </li>

                <li class="layui-nav-item">
                    <a href="javascript:;">文章管理</a>
                    <dl class="layui-nav-child">
                        <dd><a href="/admin/article_cate/index">文章分类</a></dd>
                        <dd><a href="/admin/article/index">文章列表</a></dd>
                        <dd><a href="/admin/comment/index">评论列表</a></dd>
                    </dl>
                </li>

                <li class="layui-nav-item">
                    <a href="javascript:;">用户管理</a>
                    <dl class="layui-nav-child">
                        <dd><a href="/admin/user/index">用户列表</a></dd>
                    </dl>
                </li>

                <li class="layui-nav-item">
                    <a href="javascript:;">网站管理</a>
                    <dl class="layui-nav-child">
                        <dd><a href="">基本设置</a></dd>
                        <dd><a href="">权限组</a></dd>
                    </dl>
                </li>

                <li class="layui-nav-item">
                    <a href="javascript:;">运营管理</a>
                    <dl class="layui-nav-child">
                        <dd><a href="/admin/carousel/index">首页轮播图</a></dd>
                        <dd><a href="">广告位</a></dd>
                        <dd><a href="">友情链接组</a></dd>
                        <dd><a href="">友链管理</a></dd>
                    </dl>
                </li>



                {{--<li class="layui-nav-item"><a href="">云市场</a></li>--}}
                {{--<li class="layui-nav-item"><a href="">发布商品</a></li>--}}
            </ul>
        </div>
    </div>
    @show
    <div class="layui-body">
        <!-- 内容主体区域 -->
        @if (session('status'))
            <div class="alert alert-success">
                <script !src="">alert("{{ session('status') }}")</script>
            </div>
        @endif

        @section('content')
        <span class="layui-breadcrumb">
          <a href="/">首页</a>
          <a href="/demo/">演示</a>
          <a><cite>导航元素</cite></a>
        </span>
        <div style="padding-left: 40px; padding-top: 10px;">
                内容主题
        </div>
        @show


    </div>

    @section('footer')
    <div class="layui-footer">
        <!-- 底部固定区域 -->
        © author - HaoKai
    </div>
    @show
@section('js')
</div>

<script>
    //JavaScript代码区域
    layui.use(['element','colorpicker','layer'], function(){
        var element = layui.element;
        var colorpicker = layui.colorpicker;
        var layer = layui.layer;

        colorpicker.render({
            elem: '#test-all'
            ,color: 'rgba(7, 155, 140, 1)'
            ,format: 'rgb'
            ,predefine: true
            ,alpha: true
            ,done: function(color){
                $('#test-all-input').val(color); //向隐藏域赋值
                color || this.change(color); //清空时执行 change
            }
            ,change: function(color){
                //给当前页面头部和左侧设置主题色
                $('.bg-color').css('background-color', color);
            }
        });

    });
</script>
</body>
</html>
@show
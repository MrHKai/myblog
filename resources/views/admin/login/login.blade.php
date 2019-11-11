<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>管理员登录</title>
    <link rel="stylesheet" type="text/css" href="/login/css/style.css" />
    <link rel="stylesheet" type="text/css" href="/login/css/body.css"/>
    <link rel="stylesheet" type="text/css" href="/layui/css/layui.css"/>
</head>
<body>
<div class="container" style="padding-top: 200px;">
    <section id="content">
        <form action="/loginDo" method="post">
            <h1>管理员登录</h1>
            <div>
                <input type="text" placeholder="用户名/手机号" autocomplete="off" required="" name="username" id="username" />
            </div>
            <div>
                <input type="password" placeholder="密码" autocomplete="off" required="" name="password" id="password" />
            </div>
            <div class="">
                <span class="help-block u-errormessage" id="js-server-helpinfo">&nbsp;</span>			</div>
            <div>
                {{--<input type="submit" value="登录" id="js-btn-login"/>--}}
                <button type="submit" class="layui-btn layui-btn-normal layui-btn-radius" lay-submit="" lay-filter="demo1" style="width: 300px;">登录</button>
                <a href="#">还没有账号?立即注册</a>
                <a href="#">忘记密码?</a>
            </div>
        </form>
    </section><!-- content -->
</div>
</body>
</html>
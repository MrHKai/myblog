@extends('layouts.indexCommon')
@section('body')
    <div class="layui-container fly-marginTop">
        <div class="fly-panel fly-panel-user" pad20>
            <div class="layui-tab layui-tab-brief" lay-filter="user">
                <ul class="layui-tab-title">
                    <li class="layui-this">登入</li>
                    <li><a href="/index/reg">注册</a></li>
                </ul>
                <div class="layui-form layui-tab-content" id="LAY_ucm" style="padding: 20px 0;">
                    <div class="layui-tab-item layui-show">
                        <div class="layui-form layui-form-pane">
                            <form method="post">
                                <div class="layui-form-item">
                                    <label for="L_email" class="layui-form-label">手机号</label>
                                    <div class="layui-input-inline">
                                        <input type="text" id="L_email" name="user_phone" required lay-verify="required" autocomplete="off" class="layui-input">
                                    </div>
                                </div>
                                <div class="layui-form-item">
                                    <label for="L_pass" class="layui-form-label">密码</label>
                                    <div class="layui-input-inline">
                                        <input type="password" id="L_pass" name="password" required lay-verify="required" autocomplete="off" class="layui-input">
                                    </div>
                                </div>
                                <div class="layui-form-item">
                                    <label for="L_vercode" class="layui-form-label">人类验证</label>
                                    <div class="layui-input-inline">
                                        <input type="text" id="L_vercode" name="code" required lay-verify="required" placeholder="5+5" autocomplete="off" class="layui-input">
                                    </div>
                                    <div class="layui-form-mid">
                                        <span style="color: #c00;"></span>
                                    </div>
                                </div>
                                <div class="layui-form-item">
                                    <button class="layui-btn" lay-filter="login" lay-submit>立即登录</button>
                                    <span style="padding-left:20px;">
                  <a href="forget.html">忘记密码？</a>
                </span>
                                </div>
                                <div class="layui-form-item fly-form-app">
                                    <span>或者使用社交账号登入</span>
                                    <a href="" onclick="layer.msg('正在通过QQ登入', {icon:16, shade: 0.1, time:0})" class="iconfont icon-qq" title="QQ登入"></a>
                                    <a href="" onclick="layer.msg('正在通过微博登入', {icon:16, shade: 0.1, time:0})" class="iconfont icon-weibo" title="微博登入"></a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="/js/jquery-3.2.1.min.js"></script>
    <script src="/layui/layui.js"></script>
    <script>
        layui.use(['form', 'layedit', 'laydate','layer'], function(){
            var form = layui.form;
            var layer = layui.layer;

            //监听提交
            form.on('submit(login)', function(data){

                $.post(
                    '/index/loginDo',
                    data.field,
                    function (res) {
                        layer.msg(res.msg,{icon:res.icon});
                        if (res.code == 200){
                            location.href="/";
                        }
                    },
                    'json'
                )

                return false;
            });

        });
    </script>
@endsection
@section('right')
@endsection
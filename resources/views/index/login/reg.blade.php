@extends('layouts.indexCommon')
@section('body')
    <div class="layui-container fly-marginTop">
        <div class="fly-panel fly-panel-user" pad20>
            <div class="layui-tab layui-tab-brief" lay-filter="user">
                <ul class="layui-tab-title">
                    <li><a href="/index/login">登入</a></li>
                    <li class="layui-this">注册</li>
                </ul>
                <div class="layui-form layui-tab-content" id="LAY_ucm" style="padding: 20px 0;">
                    <div class="layui-tab-item layui-show">
                        <div class="layui-form layui-form-pane">
                            <form method="post">
                                <div class="layui-inline">
                                    <label class="layui-form-label">手机号</label>
                                    <div class="layui-input-inline">
                                        <input type="tel" id="user_phone" name="user_phone" lay-verify="required|phone" autocomplete="off" class="layui-input" style="width: 190px;">
                                    </div>
                                </div>
                                <button type="button" class="layui-btn layui-btn-normal send_phone">发送</button>
                                <div class="layui-form-item" style="margin-top: 15px;">
                                    <label for="L_username" class="layui-form-label">昵称</label>
                                    <div class="layui-input-inline">
                                        <input type="text" id="L_username" name="username" required lay-verify="required" autocomplete="off" class="layui-input">
                                    </div>
                                </div>
                                <div class="layui-form-item">
                                    <label for="L_pass" class="layui-form-label">密码</label>
                                    <div class="layui-input-inline">
                                        <input type="password" id="L_pass" name="password" required lay-verify="required" autocomplete="off" class="layui-input">
                                    </div>
                                    <div class="layui-form-mid layui-word-aux">6到16个字符</div>
                                </div>
                                <div class="layui-form-item">
                                    <label for="L_repass" class="layui-form-label">确认密码</label>
                                    <div class="layui-input-inline">
                                        <input type="password" id="L_repass" name="repassword" required lay-verify="required" autocomplete="off" class="layui-input">
                                    </div>
                                </div>
                                <div class="layui-form-item">
                                    <label for="L_vercode" class="layui-form-label">验证码</label>
                                    <div class="layui-input-inline">
                                        <input type="text" id="L_vercode" name="code" required lay-verify="required" placeholder="请输入手机验证码" autocomplete="off" class="layui-input">
                                    </div>
                                    <div class="layui-form-mid">
                                        <span style="color: #c00;"></span>
                                    </div>
                                </div>
                                <div class="layui-form-item">
                                    <button class="layui-btn" lay-filter="reg" lay-submit>立即注册</button>
                                </div>
                                <div class="layui-form-item fly-form-app">
                                    <span>或者直接使用社交账号快捷注册</span>
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
            form.on('submit(reg)', function(data){

                $.post(
                    '/index/regDo',
                    data.field,
                    function (res) {
                        if(res.code == 200){
                            layer.confirm('注册成功,点击立即登录?', function(index){
                                location.href = '/index/login';
                            });
                        }else{
                            layer.msg(res.msg,{icon:res.icon})
                        }
                    },
                    'json'
                )

                return false;
            });

        });
        $('.send_phone').click(function () {
            var user_phone = $('#user_phone').val();
            if (user_phone == ''){
                layer.msg('请输入手机号',{icon:7});
            }
            var myreg=/^[1][3,4,5,7,8][0-9]{9}$/;
            if (!myreg.test(user_phone)) {
                layer.msg('请输入正确的手机号',{icon:7});
            }

            // 发送手机验证码
            $.post(
                '/sendPhoneCode',
                {phone:user_phone,type:1},
                function (res) {
                    layer.msg(res.msg,{icon:res.icon});
                },
                'json'
            )



        })
    </script>
    
@endsection
@section('right')
@endsection
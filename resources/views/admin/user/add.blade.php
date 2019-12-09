@extends('layouts.adminCommon')

@section('title', '添加用户')

@section('content')
    <style>
        #demoText {
            border: 1px solid #000000;
            width: 102px;
            height: 102px;
            float: left;
            margin: 18px;
        }
    </style>
    <div style="padding: 15px;">
        <span class="layui-breadcrumb">
          <a href="">用户管理</a>
          <a href="">添加用户</a>
        </span>

        <div style="padding: 30px;">
            <form class="layui-form layui-form-pane" action="">
                <div class="layui-form-item">
                    <label class="layui-form-label">用户名称</label>
                    <div class="layui-input-block">
                        <input type="text" value="" lay-verify="name"  name="username"  autocomplete="off" placeholder="不能为空" class="layui-input">
                    </div>
                </div>

                <div class="layui-form-item">
                    <label class="layui-form-label">用户密码</label>
                    <div class="layui-input-block">
                        <input type="password" value="" name="password"  autocomplete="off" placeholder="" class="layui-input">
                    </div>
                </div>


                <div class="layui-form-item">
                    <label class="layui-form-label">用户头像</label>
                    <input type="hidden" name="user_logo" id="user_logo" value="">
                    <div class="layui-upload-drag" id="upload"  name="art_img" style="float: left">
                        <i class="layui-icon"></i>
                        <p>点击上传，或将文件拖拽到此处</p>
                    </div>
                    <p id="demoText"></p>
                </div>

                <div class="layui-form-item" pane="">
                    <label class="layui-form-label">性别</label>
                    <div class="layui-input-block">
                        <input type="radio" name="user_sex" value="1" title="男" checked>
                        <input type="radio" name="user_sex" value="2" title="女" >
                    </div>
                </div>

                <div class="layui-form-item">
                    <label class="layui-form-label">年龄</label>
                    <div class="layui-input-block">
                        <input type="text" value="" lay-verify="number"  name="user_age"  autocomplete="off" placeholder="" class="layui-input">
                    </div>
                </div>

                <div class="layui-form-item">
                    <label class="layui-form-label">手机号</label>
                    <div class="layui-input-block">
                        <input type="phone" value="" lay-verify="phone"  name="user_phone"  autocomplete="off" placeholder="" class="layui-input">
                    </div>
                </div>

                <div class="layui-form-item">
                    <label class="layui-form-label">邮箱</label>
                    <div class="layui-input-block">
                        <input type="email" value="" lay-verify="email"  name="user_email"  autocomplete="off" placeholder="" class="layui-input">
                    </div>
                </div>

                <div class="layui-form-item">
                    <label class="layui-form-label">地址</label>
                    <div class="layui-input-block">
                        <input type="email" value=""  name="user_address"  autocomplete="off" placeholder="" class="layui-input">
                    </div>
                </div>

                <div class="layui-form-item">
                    <button type="submit" class="layui-btn layui-btn-lg layui-btn-normal" lay-submit="" lay-filter="demo1">添加用户</button>
                </div>
            </form>

        </div>
    </div>
    <script src="/layui/layui.js" charset="utf-8"></script>

    <script>
        layui.use(['form', 'layedit', 'laydate','upload','layer'], function(){
            var form = layui.form
                ,layer = layui.layer
                ,layedit = layui.layedit
                ,upload = layui.upload
                ,laydate = layui.laydate;

            //自定义验证规则
            form.verify({
                name: function(value){
                    if(value.length < 2){
                        return '用户名称2-6个字符';
                    }
                    if(value.length > 6){
                        return '用户名称2-6个字符';
                    }
                }
            });

            //文件拖拽上传
            upload.render({
                elem: '#upload'
                ,url: '/upload'
                ,done: function(res){
                    var str = '<img src="'+ res.src +'" alt="图片错误" width="100px;" height="100px;" style="margin: 1px;">';
                    $('#user_logo').val(res.src);
                    $('#demoText').html(str);
                }
            });

            //监听提交
            form.on('submit(demo1)', function(data){
                $.post(
                    '/admin/user/add',
                    data.field,
                    function (res) {
                        if(res.code == 200){
                            layer.confirm('添加成功,是否返回首页?', function(index){
                                location.href = '/admin/user/index';
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
    </script>
@endsection
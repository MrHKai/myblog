@extends('layouts.adminCommon')
@section('title', '列表')

@section('content')
    <div style="padding: 15px;">
        <span class="layui-breadcrumb">
          <a href="">导航栏设置</a>
          <a href="">导航修改</a>

        </span>
    </div>

    <div style="padding: 30px;">
        <form class="layui-form layui-form-pane" action="">
            <div class="layui-form-item">
                <label class="layui-form-label">导航名称</label>
                <div class="layui-input-block">
                    <input type="text" value="" name="nav_name" autocomplete="off" placeholder="不能为空" class="layui-input">
                </div>
            </div>

            <div class="layui-form-item">
                <label class="layui-form-label">跳转地址</label>
                <div class="layui-input-block">
                    <input type="text" name="nav_url" value="" autocomplete="off" placeholder="" class="layui-input">
                </div>
            </div>

            <div class="layui-form-item" pane="">
                <label class="layui-form-label">是否展示</label>
                <div class="layui-input-block">
                    <input type="checkbox" id="is_show"  name="nav_is_show" lay-skin="switch" lay-filter="switchTest" value="" title="展示">
                </div>
            </div>

            <div class="layui-form-item">
                <button class="layui-btn" lay-submit="" lay-filter="demo1">添加</button>
            </div>
        </form>

    </div>
    <script>
        layui.use(['form', 'layedit', 'laydate'], function(){
            var form = layui.form
                ,layer = layui.layer
                ,layedit = layui.layedit
                ,laydate = layui.laydate;

            //自定义验证规则
            form.verify({
                title: function(value){
                    if(value.length < 2){
                        return '标题至少得2个字符啊';
                    }
                    if(value.length > 5){
                        return '标题最多5个字符啊';
                    }
                }
            });

            //监听指定开关
            form.on('switch(switchTest)', function(data){
                if (this.checked == true){
                    $('#is_show').val(1)
                }else{
                    $('#is_show').val(2)
                }
                layer.tips(this.checked ? '展示' : '关闭', data.othis)
            });

            //监听提交
            form.on('submit(demo1)', function(data){
                $.post(
                    '/admin/nav/add',
                    data.field,
                    function (res) {
                        if(res.code == 200){
                            layer.confirm('添加成功,是否返回首页?', function(index){
                                location.href = '/admin/nav/list';
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

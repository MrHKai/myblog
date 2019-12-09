@extends('layouts.adminCommon')
@section('title', '文章分类')
<style>
    #demoText {
        border: 1px solid #000000;
        width: 302px;
        height: 102px;
        float: left;
        margin: 18px;
    }
</style>
@section('content')
    <div style="padding: 15px;">
        <span class="layui-breadcrumb">
          <a href="#">文章管理</a>
          <a href="#">分类添加</a>

        </span>
    </div>

    <div style="padding: 30px;">
        <form class="layui-form layui-form-pane" action="">
            <div class="layui-form-item">
                <label class="layui-form-label">分类名称</label>
                <div class="layui-input-block">
                    <input type="text" value="" lay-verify="name"  name="cate_name"  autocomplete="off" placeholder="不能为空" class="layui-input">
                </div>
            </div>

            <div class="layui-form-item">
                <button type="submit" class="layui-btn layui-btn-lg layui-btn-normal" lay-submit="" lay-filter="demo1">添加分类</button>
            </div>
        </form>

    </div>
    <script src="/layui/layui.js" charset="utf-8"></script>
    <script>
        layui.use(['form','layer'], function(){
            var form = layui.form
                ,layer = layui.layer

            //自定义验证规则
            form.verify({
                name: function(value){
                    if(value.length < 2){
                        return '名称长度2-8个字符';
                    }
                    if(value.length > 8){
                        return '名称长度2-8个字符';
                    }
                }
            });

            //监听提交
            form.on('submit(demo1)', function(data){
                $.post(
                    '/admin/article_cate/add',
                    data.field,
                    function (res) {
                        if(res.code == 200){
                            layer.confirm('添加成功,是否返回首页?', function(index){
                                location.href = '/admin/article_cate/index';
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

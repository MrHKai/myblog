@extends('layouts.adminCommon')
@section('title', '文章添加')
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
          <a href="">文章管理</a>
          <a href="">文章添加</a>

        </span>
    </div>

    <div style="padding: 30px;">
        <form class="layui-form layui-form-pane" action="">
            <div class="layui-form-item">
                <label class="layui-form-label">文章名称</label>
                <div class="layui-input-block">
                    <input type="text" value="" lay-verify="name"  name="art_title"  autocomplete="off" placeholder="不能为空" class="layui-input">
                </div>
            </div>


            <div class="layui-form-item">
                <label class="layui-form-label">文章图片</label>
                <input type="hidden" name="art_img" id="art_img" value="">
                <div class="layui-upload-drag" id="upload"  name="art_img" style="float: left">
                    <i class="layui-icon"></i>
                    <p>点击上传，或将文件拖拽到此处</p>
                </div>
                <p id="demoText"></p>
            </div>

            <div class="layui-form-item">
                <label class="layui-form-label">阅读量</label>
                <div class="layui-input-block">
                    <input type="text" value="" lay-verify="name"  name="read"  autocomplete="off" placeholder="虚拟值" class="layui-input">
                </div>
            </div>

            <div class="layui-form-item">
                <label class="layui-form-label">文章类型</label>
                <div class="layui-input-block">
                    <select name="text_type" lay-filter="aihao">
                        <option value="0">请选择</option>
                        <option value="1">提问</option>
                        <option value="2">分享</option>
                        <option value="3">建议</option>
                        <option value="4">悬赏</option>
                        <option value="5">讨论</option>
                    </select>
                </div>
            </div>

            <div class="layui-form-item" pane="">
                <label class="layui-form-label">是否展示</label>
                <div class="layui-input-block">
                    <input type="checkbox" id="is_show"   name="is_show" lay-skin="switch" lay-filter="switchTest" value="" title="展示">
                </div>
            </div>
            <div class="layui-form-item" pane="">
                <label class="layui-form-label">是否精帖</label>
                <div class="layui-input-block">
                    <input type="checkbox" id="is_boutique"   name="is_boutique" lay-skin="switch" lay-filter="is_boutique" value="" title="是">
                </div>
            </div>

            <fieldset class="layui-elem-field layui-field-title" style="margin-top: 30px;">
                <legend>文章内容</legend>
            </fieldset>
            <textarea id="content" name="art_content" style="display: none;"></textarea>

            <div class="layui-form-item">
                <button type="submit" class="layui-btn layui-btn-lg layui-btn-normal" lay-submit="" lay-filter="demo1">添加文章</button>
            </div>
        </form>

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
                        return '分类名称至少得2个字符啊';
                    }
                    if(value.length > 50){
                        return '分类名称最多50个字符啊';
                    }
                }
            });

            layui.use('layedit', function(){
                var layedit = layui.layedit;
                layedit.set({
                    uploadImage: {
                        url: '/uploadLayedit' //接口url
                    }
                });
                layedit.build('content'); //建立编辑器


            });

            //文件拖拽上传
            upload.render({
                elem: '#upload'
                ,url: '/upload'
                ,done: function(res){
                    var str = '<img src="'+ res.src +'" alt="图片错误" width="300px;" height="100px;" style="margin: 1px;">';
                    $('#art_img').val(res.src);
                    $('#demoText').html(str);
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
            //监听指定开关
            form.on('switch(is_boutique)', function(data){
                if (this.checked == true){
                    $('#is_boutique').val(1)
                }else{
                    $('#is_boutique').val(2)
                }
                layer.tips(this.checked ? '是' : '否', data.othis)
            });

            //监听提交
            form.on('submit(demo1)', function(data){
                $.post(
                    '/admin/article/add',
                    data.field,
                    function (res) {
                        if(res.code == 200){
                            layer.confirm('添加成功,是否返回首页?', function(index){
                                location.href = '/admin/article/index';
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

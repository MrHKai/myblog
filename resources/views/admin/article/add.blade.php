@extends('layouts.adminCommon')
@section('title', '文章添加')
<style>
    #demoText {
        border: 1px solid #000000;
        width: 102px;
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
                <label class="layui-form-label">导航/分类</label>
                <div class="layui-input-inline">
                    <select name="" lay-filter="nav">
                        <option value="">请选择导航</option>
                        @foreach($nav_data as $k=>$v)
                            <option value="{{$v->nav_id}}">{{$v->nav_name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="layui-input-inline">
                    <select name="cate_id" id="cate">
                        <option value="">所属分类</option>
                    </select>
                </div>
                <div class="layui-form-mid layui-word-aux">请选择导航/分类</div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">文章图片</label>
                <div class="layui-upload-drag" id="upload" name="art_img" style="float: left">
                    <i class="layui-icon"></i>
                    <p>点击上传，或将文件拖拽到此处</p>
                </div>
                <p id="demoText"></p>
            </div>

            <div class="layui-form-item" pane="">
                <label class="layui-form-label">是否展示</label>
                <div class="layui-input-block">
                    <input type="checkbox" id="is_show"   name="is_show" lay-skin="switch" lay-filter="switchTest" value="" title="展示">
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
                    var str = '<img src="'+ res.src +'" alt="图片错误" width="100px;" height="100px;" style="margin: 1px;">';
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

            //监听select选择
            form.on('select(nav)', function(data){
                var nav_id = data.value //得到被选中的值
                $.post(
                    '/admin/article/get_cate',
                    {nav_id:nav_id},
                    function (obj) {
                        if (obj.code == 0){
                            layer.msg(obj.msg,{icon:obj.icon});
                            var html = '<option value="">请选择分类</option>';
                        }else if (obj.code == 302){
                            // 当前导航下无分类，提示是否去添加
                            layer.confirm(obj.msg, function(index){
                                location.href = '/admin/cate/add';
                            });
                            var html = '<option value="">暂无分类</option>';
                        }else if (obj.code == 200){

                            var html = '<option value="">请选择分类</option>';

                            for (var j = 0; j < obj.data.length; j++){
                                html += '<option value="'+ obj.data[j].cate_id +'">'+ obj.data[j].cate_name +'</option>';
                            }
                        }
                        // 追加到分类
                        $('#cate').html(html);
                        // 刷新表单
                        form.render('select');
                    },
                    'json'
                )

            });

        });
    </script>

@endsection

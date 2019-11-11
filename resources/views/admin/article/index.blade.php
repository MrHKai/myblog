@extends('layouts.adminCommon')
@section('title', '文章列表')

@section('content')
    <div style="padding: 15px;">
        <span class="layui-breadcrumb">
          <a href="">文章管理</a>
          <a href="">文章列表</a>

        </span>
    </div>

    <div style="padding: 30px;">
        <button type="button" class="layui-btn">
            <i class="layui-icon">&#xe608;</i> <a href="/admin/article/add">添加文章</a>
        </button>
        <table id="demo" lay-filter="test"></table>
    </div>

    <script type="text/html" id="barDemo">
        <a class="layui-btn layui-btn-xs" lay-event="edit">编辑</a>
        <a class="layui-btn layui-btn-danger layui-btn-xs" lay-event="del">删除</a>
    </script>

    <script>
        layui.use(['table','form','layer'], function(){
            var table = layui.table
                ,layer = layui.layer
                ,form = layui.form;
            //
            table.render({
                elem: '#demo'
                ,height: 800
                ,url: '/admin/article/get_art' //数据接口
                ,page: true //开启分页
                ,cols: [[ //表头
                    {type: 'checkbox', fixed: 'left', width:'5%'},
                    {field: 'art_id', title: 'ID', width:'5%', sort: true, fixed: 'left'}
                    ,{field: 'art_title', title: '文章标题', width:'10%'}
                    ,{field: 'art_content', title: '文章内容', width:'20%'}
                    ,{field: 'user_id', title: '发帖用户', width:'10%'}
                    ,{field: 'text_type', title: '文章类型', width:'10%'}
                    ,{field: 'is_boutique', title: '是否精帖', width:'10%'}
                    ,{field: 'read', title: '阅读量', width:'10%'}
                    ,{field: 'art_img', title: '文章标题图片', width:'10%',templet: function(d){
                        return '<img src="'+ d.art_img +'" width="100px;" height="100px;">'}}
                    ,{fixed: 'right', width:'10%', align:'center', toolbar: '#barDemo'} //这里的toolbar值是模板元素的选择器
                ]]
            });


            //监听行工具事件
            table.on('tool(test)', function(obj){
                var data = obj.data;
                var art_id = obj.data.art_id;
                if(obj.event === 'del'){
                    layer.confirm('是否确定删除', function(index){
                        obj.del();
                        layer.close(index);
                        $.post(
                            '/admin/article/del',
                            {art_id:art_id},
                            function (res) {
                                layer.msg(res.msg,{icon:res.icon})
                            },
                            'json'
                        )
                    });
                } else if(obj.event === 'edit'){
                    location.href = "/admin/article/edit?art_id=" + obj.data.art_id;
                }
            });

        });
    </script>
@endsection

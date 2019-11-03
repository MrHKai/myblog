@extends('layouts.adminCommon')
@section('title', '列表')

@section('content')
    <div style="padding: 15px;">
        <span class="layui-breadcrumb">
          <a href="">分类管理</a>
          <a href="">分类列表</a>

        </span>
    </div>

    <div style="padding: 30px;">
        <button type="button" class="layui-btn">
            <i class="layui-icon">&#xe608;</i> <a href="/admin/cate/add">添加分类</a>
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
                ,height: 700
                ,url: '/admin/cate/get_cate' //数据接口
                ,page: true //开启分页
                ,cols: [[ //表头
                    {type: 'checkbox', fixed: 'left', width:'5%'},
                    {field: 'cate_id', title: 'ID', width:'15%', sort: true, fixed: 'left'}
                    ,{field: 'cate_name', title: '导航名称', width:'25%'}
                    ,{field: 'cate_is_show', title: '是否展示', width:'15%'}
                    ,{field: 'nav_name', title: '上级导航栏', width:'20%'}
                    ,{fixed: 'right', width:'20%', align:'center', toolbar: '#barDemo'} //这里的toolbar值是模板元素的选择器
                ]]
            });


            //监听行工具事件
            table.on('tool(test)', function(obj){
                var data = obj.data;
                var cate_id = obj.data.cate_id;
                if(obj.event === 'del'){
                    layer.confirm('是否确定删除', function(index){
                        obj.del();
                        layer.close(index);
                        $.post(
                            '/admin/cate/del',
                            {cate_id:cate_id},
                            function (res) {
                                layer.msg(res.msg,{icon:res.icon})
                            },
                            'json'
                        )
                    });
                } else if(obj.event === 'edit'){
                    location.href = "/admin/cate/edit?id=" + obj.data.cate_id;
                }
            });

        });
    </script>
@endsection

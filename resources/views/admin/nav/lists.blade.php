@extends('layouts.adminCommon')
@section('title', '列表')

@section('content')
    <div style="padding: 15px;">
        <span class="layui-breadcrumb">
          <a href="">导航栏设置</a>
          <a href="">导航栏列表</a>

        </span>
    </div>

    <div style="padding: 30px;">
        <button type="button" class="layui-btn">
            <i class="layui-icon">&#xe608;</i> <a href="/admin/nav/add">添加导航</a>
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
                ,url: '/admin/nav/get_list' //数据接口
                ,page: true //开启分页
                ,cols: [[ //表头
                    {type: 'checkbox', fixed: 'left', width:'5%'},
                    {field: 'nav_id', title: 'ID', width:'15%', sort: true, fixed: 'left'}
                    ,{field: 'nav_name', title: '导航名称', width:'25%'}
                    ,{field: 'nav_is_show', title: '是否展示', width:'15%'}
                    ,{field: 'nav_url', title: '跳转地址', width:'20%'}
                    ,{fixed: 'right', width:'20%', align:'center', toolbar: '#barDemo'} //这里的toolbar值是模板元素的选择器
                ]]
            });


            //监听行工具事件
            table.on('tool(test)', function(obj){
                var data = obj.data;
                var nav_id = obj.data.nav_id;
                if(obj.event === 'del'){
                    layer.confirm('是否确定删除', function(index){
                        obj.del();
                        layer.close(index);
                        $.post(
                            '/admin/nav/del',
                            {nav_id:nav_id},
                            function (res) {
                                layer.msg(res.msg,{icon:res.icon})
                            },
                            'json'
                        )
                    });
                } else if(obj.event === 'edit'){
                    location.href = "/admin/nav/edit?id=" + obj.data.nav_id;
                }
            });

        });
    </script>
@endsection

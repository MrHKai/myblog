@extends('layouts.adminCommon')
@section('title', '文章分类')

@section('content')

    <style>
        .layui-table-cell{
            height:40px;
            line-height: 40px;
        }
        .white {
            color: #ffffff;
        }
    </style>

    <div style="padding: 15px;">
        <span class="layui-breadcrumb">
          <a href="#">文章管理</a>
          <a href="#">文章分类</a>
        </span>
    </div>

    <div style="padding: 30px;">
        <form class="layui-form" action="">
            <div class="layui-inline">
                <button type="button" class="layui-btn layui-btn-normal">
                    <i class="layui-icon">&#xe608;</i> <a href="/admin/article_cate/add" class="white">添加分类</a>
                </button>
            </div>
        </form>

        <table id="demo" lay-filter="tableOne"></table>
    </div>

    <script>
        layui.use(['table','form','layer'], function(){
            var table = layui.table
                ,layer = layui.layer
                ,form = layui.form;
            //
            table.render({
                elem: '#demo'
                ,height: 800
                ,url: '/admin/article_cate/get_art_cate' //数据接口
                ,cols: [[ //表头
                    {field: 'cate_id', title: 'ID', width:'5%', sort: true, fixed: 'left'}
                    ,{field: 'cate_name', title: '分类名称', edit: 'text'}
                    ,{field: 'count', title: '分类文章',width:'8%',sort:true,templet:function (d) {
                        return '<span>'+ d.count +'篇</span>';
                    }}
                    ,{field: 'cate_status', title: '分类状态',width:'10%',templet: '#cate_status'}
                    ,{field: 'c_time', title: '添加时间',width:'10%', sort: true}
                    ,{fixed: 'right', width:'10%', align:'center', toolbar: '#barDemo'} //这里的toolbar值是模板元素的选择器
                ]]
                ,id:'cate'

            });

            //监听单元格编辑
            table.on('edit(tableOne)', function(obj){
                var cate_id = obj.data.cate_id;
                var value = obj.value;

                layer.confirm('是否确定修改', function(index){
                    $.post(
                        '/admin/article_cate/edit_do',
                        {cate_id:cate_id,value:value},
                        function (res) {
                            layer.msg(res.msg,{icon:res.icon,time:1500});
                        },
                        'json'
                    )
                })
            });

            //监听行工具事件
            table.on('tool(tableOne)', function(obj){
                var data = obj.data;
                var cate_id = obj.data.cate_id;
                if(obj.event === 'del'){
                    layer.confirm('是否确定删除', function(index){
                        obj.del();
                        layer.close(index);
                        $.post(
                            '/admin/article_cate/del',
                            {cate_id:cate_id},
                            function (res) {
                                layer.msg(res.msg,{icon:res.icon})
                            },
                            'json'
                        )
                    });
                }
            });

        });
    </script>

    {{-- 精 --}}
    <script type="text/html" id="cate_status">
        @{{#  if(d.cate_status == 1){ }}
            <span class="layui-btn layui-btn-xs layui-btn-normal"> 正常 </span>
        @{{#  } else { }}
            <span class="layui-btn layui-btn-xs  layui-btn-danger"> 禁用 </span>
        @{{#  } }}
    </script>

    <script type="text/html" id="barDemo">
        <a class="layui-btn layui-btn-danger layui-btn-sm" lay-event="del">删除</a>
    </script>
@endsection

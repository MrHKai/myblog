@extends('layouts.adminCommon')
@section('title', '轮播图分类')

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
          <a href="#">运营维护</a>
          <a href="#">轮播图分类</a>
        </span>
    </div>

    <script type="text/html" id="barDemo">
        <a class="layui-btn layui-btn-normal layui-btn-sm" lay-event="edit">编辑</a>
        <a class="layui-btn layui-btn-danger layui-btn-sm" lay-event="del">删除</a>
        <a class="layui-btn layui-btn-warm layui-btn-sm" lay-event="set_img">设置图片</a>
    </script>

    {{-- 状态 --}}
    <script type="text/html" id="status">
        @{{#  if(d.status == 1){ }}
            <span class="layui-btn layui-btn-xs layui-btn-normal"> 展示 </span>
        @{{#  } else { }}
            <span class="layui-btn layui-btn-xs  layui-btn-danger"> 不展示 </span>
        @{{#  } }}
    </script>

    <div style="padding: 30px;">
        <div class="layui-inline">
            <button type="button" class="layui-btn layui-btn-normal">
                <i class="layui-icon">&#xe608;</i> <a href="/admin/article/add" class="white">添加分类</a>
            </button>
        </div>
        <table id="table" lay-filter="tableOne"></table>
    </div>

    <script>
        layui.use(['table','form','layer'], function(){
            var table = layui.table
                ,layer = layui.layer
                ,form = layui.form;
            //
            table.render({
                elem: '#table'
                ,height: 800
                ,url: '/admin/carousel/get_carousel_cate' //数据接口
                ,cols: [[ //表头
                    {field: 'carousel_cate_id', title: 'ID', width:'5%', sort: true, fixed: 'left'}
                    ,{field: 'carousel_cate_name', title: '分类名称', width:'25%'}
                    ,{field: 'carousel_cate_remark', title: '备注'}
                    ,{field: 'status', title: '状态', width:'3.8%',templet: '#status'}
                    ,{field: 'c_time', title: '添加时间',width:'10%', sort: true}
                    ,{fixed: 'right', width:'15%', align:'center', toolbar: '#barDemo'} //这里的toolbar值是模板元素的选择器
                ]]
            });

            //监听行工具事件
            table.on('tool(tableOne)', function(obj){
                var data = obj.data;
                var comment_id = obj.data.comment_id;
                if(obj.event === 'del'){
                    layer.confirm('是否确定删除', function(index){
                        $.post(
                            '/admin/comment/del',
                            {comment_id:comment_id,status:2},
                            function (res) {
                                layer.msg(res.msg,{icon:res.icon,time:1500},function () {
                                    location.reload();
                                })
                            },
                            'json'
                        )
                    });
                }else if(obj.event === 'edit'){

                }else if(obj.event === 'set_img'){

                }
            });

        });
    </script>
@endsection

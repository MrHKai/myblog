@extends('layouts.adminCommon')
@section('title', '文章列表')

@section('content')

    <style>
        .layui-table-cell{
            height:50px;
            line-height: 50px;
        }
        .white {
            color: #ffffff;
        }
    </style>

    <div style="padding: 15px;">
        <span class="layui-breadcrumb">
          <a href="#">文章管理</a>
          <a href="#">文章列表</a>
        </span>
    </div>

    <div style="padding: 30px;">
        <form class="layui-form" action="">
            <div class="layui-inline">
                <button type="button" class="layui-btn layui-btn-normal">
                    <i class="layui-icon">&#xe608;</i> <a href="/admin/article/add" class="white">添加文章</a>
                </button>
            </div>

            <div class="layui-inline" style="margin-left: 30px;">
                <div class="layui-input-inline">
                    <input type="text" name="username" id="username"  placeholder="按用户名查询" autocomplete="off" class="layui-input">
                </div>
            </div>
            <div class="layui-inline">
                <div class="layui-input-inline">
                    <input type="text" name="art_title" id="art_title"  placeholder="按文章标题查询" autocomplete="off" class="layui-input">
                </div>
            </div>
            <div class="layui-inline">
                <select name="text_type" id="text_type_search" lay-verify="">
                    <option value="">按文章类型</option>
                    @foreach($cate as $k => $v)
                        <option value="{{$v->cate_id}}">{{$v->cate_name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="layui-inline">
                <button type="button" class="layui-btn layui-btn-normal search">
                    <i class="layui-icon search">&#xe615;</i>
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
                ,height: 750
                ,url: '/admin/article/get_art' //数据接口
                ,cols: [[ //表头
                    {type: 'checkbox', fixed: 'left', width:'5%'},
                    {field: 'art_id', title: 'ID', width:'5%', sort: true, fixed: 'left'}
                    ,{field: 'art_title', title: '文章标题', width:'10%'}
                    ,{field: 'art_content', title: '文章内容'}
                    ,{field: 'username', title: '发帖用户', width:'10%',templet:function (d) {
                        return '<i class="layui-icon layui-icon-username" style="font-size: 30px; color: #1E9FFF;"></i>'+ d.username;
                    }}
                    ,{field: 'text_type', title: '文章类型', width:'10%',templet: '#text_type'}
                    ,{field: 'is_boutique', title: '是否精帖', width:'5%',templet: '#is_boutique'}
                    ,{field: 'read', title: '阅读量', width:'10%',sort:true}
                    ,{field: 'art_img', title: '文章标题图片', width:'10%',templet: function(d){
                        return '<img src="'+ d.art_img +'" width="100px;" height="100px;">'}}
                    ,{fixed: 'right', width:'10%', align:'center', toolbar: '#barDemo'} //这里的toolbar值是模板元素的选择器
                ]]
                ,page: true //开启分页
                ,id:'Reload'

            });

            // 执行搜索，表格重载

            $('.search').click(function () {
                // 搜索条件
                var username = $('#username').val();
                var art_title = $('#art_title').val();
                var text_type = $('#text_type_search').val();

                table.reload('Reload', {
                    method: 'post'
                    , where: {
                        'page':1,
                        'username': username,
                        'art_title': art_title,
                        'text_type': text_type,
                    }
                    , page: {
                        curr: 1
                    }
                });
            })


            //监听行工具事件
            table.on('tool(tableOne)', function(obj){
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

    {{-- 精 --}}
    <script type="text/html" id="is_boutique">
        @{{#  if(d.is_boutique == 1){ }}
            <span class="layui-btn layui-btn-xs layui-btn-normal"> 是 </span>
        @{{#  } else { }}
            <span class="layui-btn layui-btn-xs  layui-btn-danger"> 否 </span>
        @{{#  } }}
    </script>

    {{-- 文章类型 --}}
    <script type="text/html" id="text_type">
        <span class="layui-btn layui-btn-xs layui-btn-primary">@{{d.cate_name}}</span>
    </script>

    <script type="text/html" id="barDemo">
        <a class="layui-btn layui-btn-primary layui-btn-sm" lay-event="edit">编辑</a>
        <a class="layui-btn layui-btn-danger layui-btn-sm" lay-event="del">删除</a>
    </script>
@endsection

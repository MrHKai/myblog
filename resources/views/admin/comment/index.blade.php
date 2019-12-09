@extends('layouts.adminCommon')
@section('title', '评论列表')

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
          <a href="#">评论列表</a>
        </span>
    </div>

    <div style="padding: 30px;">
        <form class="layui-form" action="">
            <div class="layui-inline" >
                <div class="layui-input-inline">
                    <input type="text" name="username" id="username"  placeholder="按评论用户查询" autocomplete="off" class="layui-input">
                </div>
            </div>
            <div class="layui-inline">
                <button type="button" class="layui-btn layui-btn-normal search">
                    <i class="layui-icon search">&#xe615;</i>
                </button>
            </div>
        </form>

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
                ,url: '/admin/comment/get_comment' //数据接口
                ,cols: [[ //表头
                    {type: 'checkbox', fixed: 'left', width:'5%'},
                    {field: 'comment_id', title: 'ID', width:'5%', sort: true, fixed: 'left'}
                    ,{field: 'art_username', title: '发帖用户',width:'8%'}
                    ,{field: 'username', title: '评论用户',width:'8%'}
                    ,{field: 'art_title', title: '文章标题'}
                    ,{field: 'reply', title: '评论内容'}
                    ,{field: 'status', title: '状态',templet: '#status',width:'5%'}
                    ,{field: 'is_ok', title: '采纳',templet: '#is_ok',width:'5%'}
                    ,{field: 'stand', title: '点赞',width:'5%', sort: true,templet:function (d) {
                        return '<img src="/images/zhan.png" alt="" width="20px;" height="20px;" style="margin-bottom: 3px;"> ' + d.stand;
                    }}
                    ,{field: 'c_time', title: '添加时间',width:'10%', sort: true}
                    ,{fixed: 'right', width:'10%', align:'center', toolbar: '#barDemo'} //这里的toolbar值是模板元素的选择器
                ]]
                ,page:true
                ,id:'Reload'

            });

            // 执行搜索，表格重载

            $('.search').click(function () {
                // 搜索条件
                var username = $('#username').val();

                table.reload('Reload', {
                    method: 'post'
                    , where: {
                        'page':1,
                        'username': username,
                    }
                    , page: {
                        curr: 1
                    }
                });
            })

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
                }else if(obj.event === 'no_del'){
                    layer.confirm('是否确定展示', function(index){
                        $.post(
                            '/admin/comment/del',
                            {comment_id:comment_id,status:1},
                            function (res) {
                                layer.msg(res.msg,{icon:res.icon,time:1500},function () {
                                    location.reload();
                                })
                            },
                            'json'
                        )
                    });
                }
            });

        });
    </script>

    {{-- 状态 --}}
    <script type="text/html" id="status">
        @{{#  if(d.status == 1){ }}
            <span class="layui-btn layui-btn-xs layui-btn-normal"> 正常 </span>
        @{{#  } else { }}
            <span class="layui-btn layui-btn-xs  layui-btn-danger"> 删除 </span>
        @{{#  } }}
    </script>

    {{-- 采纳 --}}
    <script type="text/html" id="is_ok">
        @{{#  if(d.is_ok == 1){ }}
            <img src="/images/caina.png" alt="" width="40px;" height="40px;">
        @{{#  } else { }}
        @{{#  } }}
    </script>

    <script type="text/html" id="barDemo">
        @{{#  if(d.status == 1){ }}
        <a class="layui-btn layui-btn-danger layui-btn-sm" lay-event="del">删除</a>
        @{{#  } else { }}
        <a class="layui-btn layui-btn-normal layui-btn-sm" lay-event="no_del">展示</a>
        @{{#  } }}
    </script>
@endsection

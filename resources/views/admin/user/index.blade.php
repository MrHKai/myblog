@extends('layouts.adminCommon')

@section('title', '用户列表')

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
          <a href="">用户管理</a>
          <a href="">用户列表</a>

        </span>

        {{-- 添加用户 --}}
        <div style="padding: 30px;">
            <form class="layui-form" action="">
                <div class="layui-inline">
                    <button type="button" class="layui-btn layui-btn-normal">
                        <i class="layui-icon">&#xe608;</i> <a href="/admin/user/add" class="white">添加用户</a>
                    </button>
                </div>

                <div class="layui-inline" style="margin-left: 30px;">
                    <div class="layui-input-inline">
                        <input type="text" name="username" id="username"  placeholder="按用户名查询" autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-inline">
                    <div class="layui-input-inline">
                        <input type="text" name="user_phone" id="user_phone"  placeholder="按手机号查询" autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-inline">
                    <button type="button" class="layui-btn layui-btn-normal search">
                        <i class="layui-icon search">&#xe615;</i>
                    </button>
                </div>

            </form>

            <table id="demo" lay-filter="test"></table>
        </div>

        {{-- 性别 --}}
        <script type="text/html" id="user_sex">
              @{{#  if(d.user_sex == 1){ }}
                 <span class="layui-btn layui-btn-xs layui-btn-normal"> 男 </span>
              @{{#  } else { }}
               <span class="layui-btn layui-btn-xs layui-btn-danger"> 女 </span>
              @{{#  } }}
        </script>

        {{-- 状态 --}}
        <script type="text/html" id="user_status">
              @{{#  if(d.user_status == 1){ }}
                 <span class="layui-btn layui-btn-xs layui-btn-normal"> 正常 </span>
              @{{#  } else { }}
               <span class="layui-btn layui-btn-xs  layui-btn-danger"> 禁用 </span>
              @{{#  } }}
        </script>

        {{-- 工具栏 --}}
        <script type="text/html" id="barDemo">
            @{{#  if(d.user_status == 1){ }}
                <a class="layui-btn layui-btn-primary layui-btn-sm" lay-event="edit">编辑</a>
                <a class="layui-btn layui-btn-danger layui-btn-sm" lay-event="del">禁用</a>
            @{{#  } else { }}
                <a class="layui-btn layui-btn-primary layui-btn-sm" lay-event="edit">编辑</a>
                <a class="layui-btn layui-btn-normal layui-btn-sm" lay-event="no_del">解封</a>
            @{{#  } }}
        </script>
    </div>

    <script>
        layui.use(['table','form','layer','laytpl'], function(){
            var table = layui.table
                ,layer = layui.layer
                ,laytpl = layui.laytpl
                ,form = layui.form;
            //
            table.render({
                elem: '#demo'
                ,height: 800
                ,url: '/admin/user/get_user' //数据接口
                ,page: true //开启分页
                ,cols: [[ //表头
                    {type: 'checkbox', fixed: 'left', width:'5%'},
                    {field: 'user_id', title: 'ID', width:'5%', sort: true, fixed: 'left'}
                    ,{field: 'username', title: '用户名称', width:'8%'}
                    ,{field: 'user_logo', title: '用户头像', width:'5%',templet: function(d){
                        return '<img src="'+ d.user_logo +'" width="50px;" height="50px;" class="layui-circle">'
                    }}
                    ,{field: 'user_sex',width:'5%', title: '性别' , templet: '#user_sex'}
                    ,{field: 'user_age',width:'5%', title: '年龄'}
                    //,{field: 'user_money', title: '余额', sort: true}
                    ,{field: 'user_phone', title: '手机号'}
                    ,{field: 'user_email', title: '邮箱', width:'10%'}
                    ,{field: 'user_address', title: '地址', width:'10%'}
                    ,{field: 'user_status', title: '状态' , templet: '#user_status'}
                    ,{field: 'count', title: '发帖数量',sort:true,templet:function (d) {
                        return '<span>'+ d.count +'篇</span>';
                    }}
                    ,{field: 'user_hot', title: '活跃度', sort: true }
                    ,{field: 'vip', title: '等级', width:'8%', sort: true,templet:function (d) {
                        return '<span class="layui-btn layui-btn-xs layui-btn-warm">Lv'+ d.vip +'</span>'
                    }}
                    ,{fixed: 'right', width:'10%', align:'center', toolbar: '#barDemo'} //这里的toolbar值是模板元素的选择器
                ]]
                ,id:'Reload'
            });

            // 执行搜索，表格重载
            $('.search').click(function () {
                // 搜索条件
                var username = $('#username').val();
                var user_phone = $('#user_phone').val();

                table.reload('Reload', {
                    method: 'post'
                    , where: {
                        'page':1,
                        'username': username,
                        'user_phone': user_phone,
                    }
                    , page: {
                        curr: 1
                    }
                });
            })


//            //监听行工具事件
            table.on('tool(test)', function(obj){
                var data = obj.data;
                var user_id = obj.data.user_id;
                if(obj.event === 'del'){
                    layer.confirm('是否确定删除', function(index){
                        layer.close(index);
                        $.post(
                            '/admin/user/del',
                            {user_id:user_id,status:2},
                            function (res) {
                                layer.msg(res.msg,{icon:res.icon,time:1500})
                                if (res.code == 200){
                                    location.reload();
                                }
                            },
                            'json'
                        )
                    });
                } else if(obj.event === 'edit'){
                    location.href = "/admin/user/edit?user_id=" + user_id;
                } else if (obj.event === 'no_del'){
                    layer.confirm('是否确定解封', function(index){
                        layer.close(index);
                        $.post(
                            '/admin/user/del',
                            {user_id:user_id,status:1},
                            function (res) {
                                layer.msg(res.msg,{icon:res.icon,time:1500})
                                if (res.code == 200){
                                    location.reload();
                                }
                            },
                            'json'
                        )
                    });
                }
            });

        });
    </script>
@endsection
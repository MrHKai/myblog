@extends('layouts.adminCommon')
@section('title', '列表')

@section('content')
    <div style="padding: 15px;">
        <span class="layui-breadcrumb">
          <a href="">导航栏设置</a>
          <a href="">导航栏列表</a>

        </span>
    </div>
    <div style="padding-left: 0px; padding-top: 10px;">
        <table id="demo" lay-filter="test"></table>
    </div>

    <script type="text/html" id="toolbarDemo">
        <div class="layui-btn-container">
            <button class="layui-btn layui-btn-sm" lay-event="getCheckData">获取选中行数据</button>
            <button class="layui-btn layui-btn-sm" lay-event="getCheckLength">获取选中数目</button>
            <button class="layui-btn layui-btn-sm" lay-event="isAll">验证是否全选</button>
        </div>
    </script>

    <script type="text/html" id="barDemo">
        <a class="layui-btn layui-btn-xs" lay-event="edit">编辑</a>
        <a class="layui-btn layui-btn-danger layui-btn-xs" lay-event="del">删除</a>
    </script>

    <script type="text/html" id="checkboxTpl">
        <input type="checkbox" name="lock" value="{{}}" title="展示" lay-filter="lockDemo" >
    </script>


    <script>
        layui.use(['table','form'], function(){
            var table = layui.table
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
                    ,{field: 'nav_is_show', title: '是否展示', width:'15%',templet: '#checkboxTpl', unresize: true}
                    ,{field: 'nav_url', title: '跳转地址', width:'20%'}
                    ,{fixed: 'right', width:'20%', align:'center', toolbar: '#barDemo'} //这里的toolbar值是模板元素的选择器
                ]]
                ,toolbar: '#toolbarDemo' //开启头部工具栏，并为其绑定左侧模板
                ,defaultToolbar: ['filter', 'exports', 'print', { //自定义头部工具栏右侧图标。如无需自定义，去除该参数即可
                    title: '提示'
                    ,layEvent: 'LAYTABLE_TIPS'
                    ,icon: 'layui-icon-tips'
                }]
            });

            //头工具栏事件
            table.on('toolbar(demo)', function(obj){
                var checkStatus = table.checkStatus(obj.config.id);
                switch(obj.event){
                    case 'getCheckData':
                        var data = checkStatus.data;
                        layer.alert(JSON.stringify(data));
                        break;
                    case 'getCheckLength':
                        var data = checkStatus.data;
                        layer.msg('选中了：'+ data.length + ' 个');
                        break;
                    case 'isAll':
                        layer.msg(checkStatus.isAll ? '全选': '未全选');
                        break;

                    //自定义头工具栏右侧图标 - 提示
                    case 'LAYTABLE_TIPS':
                        layer.alert('这是工具栏右侧自定义的一个图标按钮');
                        break;
                };
            });

            //监听行工具事件
            table.on('tool(test)', function(obj){
                var data = obj.data;
                //console.log(obj)
                if(obj.event === 'del'){
                    layer.confirm('是否确定删除', function(index){
                        obj.del();
                        layer.close(index);
                    });
                } else if(obj.event === 'edit'){
                    location.href = "/admin/nav/edit?id=" + obj.data.nav_id;
                }
            });

        });
    </script>
@endsection

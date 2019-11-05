@extends('layouts.adminCommon')
@section('title', '列表')

@section('content')
    <div style="padding: 15px;">
        <span class="layui-breadcrumb">
          <a href="">分类管理</a>
          <a href="">分类添加</a>

        </span>
    </div>

    <div style="padding: 30px;">
        <form class="layui-form layui-form-pane" action="">

            <div class="layui-form-item">
                <label class="layui-form-label">当前ID</label>
                <div class="layui-input-block">
                    <input type="text" value="{{$cate_data->cate_id}}"  name="cate_id" autocomplete="off" disabled class="layui-input">
                </div>
            </div>

            <div class="layui-form-item">
                <label class="layui-form-label">分类名称</label>
                <div class="layui-input-block">
                    <input type="text" value="{{$cate_data->cate_name}}" name="cate_name" autocomplete="off" placeholder="不能为空" class="layui-input">
                </div>
            </div>

            <div class="layui-form-item">
                <label class="layui-form-label">上级导航</label>
                <div class="layui-input-block">
                    <select name="nav_id" lay-filter="">
                        @foreach($nav_data as $k=>$v)
                            <option value="{{$v->nav_id}}" @if($v->nav_id == $cate_data->nav_id) selected @endif>{{$v->nav_name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="layui-form-item" pane="">
                <label class="layui-form-label">是否展示</label>
                <div class="layui-input-block">
                    <input type="checkbox" id="is_show" @if($cate_data->cate_is_show == 1) checked @endif name="cate_is_show" lay-skin="switch" lay-filter="switchTest" value="" title="展示">
                </div>
            </div>

            <div class="layui-form-item">
                <button class="layui-btn" lay-submit="" lay-filter="demo1">修改</button>
            </div>
        </form>

    </div>
    <script>
        layui.use(['form', 'layedit', 'laydate'], function(){
            var form = layui.form
                ,layer = layui.layer
                ,layedit = layui.layedit
                ,laydate = layui.laydate;

            //自定义验证规则
            form.verify({
                title: function(value){
                    if(value.length < 2){
                        return '分类名称至少得2个字符啊';
                    }
                    if(value.length > 6){
                        return '分类名称最多6个字符啊';
                    }
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
                    '/admin/cate/edit_do',
                    data.field,
                    function (res) {
                        if(res.code == 200){
                            layer.confirm('修改成功,是否返回首页?', function(index){
                                location.href = '/admin/cate/index';
                            });
                        }else{
                            layer.msg(res.msg,{icon:res.icon})
                        }

                    },
                    'json'
                )
                return false;
            });


        });
    </script>

@endsection

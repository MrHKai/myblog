@extends('layouts.indexCommon')
@section('content')
    {{-- 循环22个--}}
    @foreach($data as $k=>$v)
    <div class="layui-col-xs12 layui-col-md8 layui-col-md8-blogs">
        <div class="grid-demo grid-demo-bg1">
            <div class="user_logo" >
                <img src="{{$v->user_logo}}" alt="" width="70px;" height="70px;" style="margin-top: 20%">
            </div>
            <div class="user_two">
                <span class="layui-badge layui-bg-orange layui-user-tag">{{$v->text_type}}</span>
                <span class="layui-user-tag">{{$v->art_title}}</span>
                <span class="layui-badge layui-user-tag-right">{{$v->is_boutique}}</span>

            </div>
            <div class="user_tre">
                <span class="user-info">{{$v->username}}</span>
                <span class="user-info">{{$v->c_time}}</span>
                <span class="user-info layui-user-info-right"><i class="layui-icon">&#xe705;</i>{{$v->read}}</span>

            </div>
        </div>
    </div>
    @endforeach
@endsection
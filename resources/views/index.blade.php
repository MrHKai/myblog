@extends('layouts.indexCommon')

@section('body')
    {{-- 置顶 --}}
    <div class="fly-panel">
        <div class="fly-panel-title fly-filter">
            <a>置顶</a>
            <a href="#signin" class="layui-hide-sm layui-show-xs-block fly-right" id="LAY_goSignin" style="color: #FF5722;">去签到</a>
        </div>
        <ul class="fly-list">
            @foreach($data_top as $k=>$v)
                <li>
                    <a href="user/home.html" class="fly-avatar">
                        <img src="{{$v->user_logo}}" alt="lmd">
                    </a>
                    <h2>
                        @if($v->text_type == 6)    <a class="layui-badge layui-bg-black">LINUX</a>
                        @elseif($v->text_type == 1)<a class="layui-badge">PHP</a>
                        @elseif($v->text_type == 2)<a class="layui-badge layui-bg-orange">MYSQL</a>
                        @elseif($v->text_type == 3)<a class="layui-badge layui-bg-green">CSS</a>
                        @elseif($v->text_type == 4)<a class="layui-badge layui-bg-orange">JQUERY</a>
                        @elseif($v->text_type == 5)<a class="layui-badge layui-bg-blue">NGINX</a>
                        @endif
                        <a href="/index/article/content?art_id={{$v->art_id}}">{{$v->art_title}}</a>
                    </h2>
                    <div class="fly-list-info">
                        <a href="user/home.html" link>
                            <cite>{{$v->username}}</cite>
                            <!--
                            <i class="iconfont icon-renzheng" title="认证信息：XXX"></i>
                            <i class="layui-badge fly-badge-vip">VIP3</i>
                            -->
                        </a>
                        <span>{{$v->c_time}}</span>

                        <span class="fly-list-kiss layui-hide-xs" title="悬赏飞吻"><i class="iconfont icon-kiss"></i> {{$v->offer_money}}</span>
                        <!--<span class="layui-badge fly-badge-accept layui-hide-xs">已结</span>-->
                        <span class="fly-list-nums">
                <i class="iconfont icon-pinglun1" title="阅读"></i> {{$v->read}}
              </span>
                    </div>
                    <div class="fly-list-badge">
                        <!--<span class="layui-badge layui-bg-red">精帖</span>-->
                    </div>
                </li>
            @endforeach
        </ul>
    </div>

    {{-- 内容 --}}
    <div class="fly-panel" style="margin-bottom: 0;">

        <div class="fly-panel-title fly-filter">
            <span class="fly-filter-right layui-hide-xs">
            <a href="/?type={{$type}}" @if($field == 'c_time') class="layui-this" @endif>按最新</a>
            <span class="fly-mid"></span>
            <a href="?read=1&type={{$type}}" @if($field == 'read') class="layui-this" @endif>按热议</a>
          </span>
        </div>

        <ul class="fly-list">
            @foreach($data as $k=>$v)
                <li>
                <a href="user/home.html" class="fly-avatar">
                    <img src="{{$v->user_logo}}" alt="lmd">
                </a>
                <h2>
                    @if($v->text_type == 6)<a class="layui-badge layui-bg-black">LINUX</a>
                    @elseif($v->text_type == 1)<a class="layui-badge">PHP</a>
                    @elseif($v->text_type == 2)<a class="layui-badge layui-bg-orange">MYSQL</a>
                    @elseif($v->text_type == 3)<a class="layui-badge layui-bg-green">CSS</a>
                    @elseif($v->text_type == 4)<a class="layui-badge layui-bg-orange">JQUERY</a>
                    @elseif($v->text_type == 5)<a class="layui-badge layui-bg-blue">NGINX</a>
                    @endif
                    <a href="/index/article/content?art_id={{$v->art_id}}&type={{$type}}">{{$v->art_title}}</a>
                </h2>
                <div class="fly-list-info">
                    <a href="user/home.html" link>
                        <cite>{{$v->username}}</cite>
                        <!--
                        <i class="iconfont icon-renzheng" title="认证信息：XXX"></i>
                        <i class="layui-badge fly-badge-vip">VIP3</i>
                        -->
                    </a>
                    <span>{{$v->c_time}}</span>

                    <span class="fly-list-kiss layui-hide-xs" title="悬赏飞吻"><i class="iconfont icon-kiss"></i> {{$v->offer_money}}</span>
                    <!--<span class="layui-badge fly-badge-accept layui-hide-xs">已结</span>-->
                    <span class="fly-list-nums">
                <i class="iconfont icon-pinglun1" title="阅读"></i> {{$v->read}}
              </span>
                </div>
                <div class="fly-list-badge">
                    <!--<span class="layui-badge layui-bg-red">精帖</span>-->
                </div>
            </li>
            @endforeach
        </ul>
        <div style="text-align: center">
            {{$data->links()}}
        </div>
        <div style="text-align: center">
            {{--<div class="laypage-main">--}}
                {{--<a href="jie/index.html" class="laypage-next">更多求解</a>--}}
            {{--</div>--}}
        </div>

    </div>
@endsection
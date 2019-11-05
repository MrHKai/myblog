@section('head')
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <meta name="keywords" content="关键词,关键词,关键词,关键词,5个关键词" />
    <meta name="description" content="网站简介，不超过80个字" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/index/css/index.css" rel="stylesheet">
    <script src="/index/js/jquery.min.js" ></script>
    <script src="/index/js/comm.js" ></script>
    <!--[if lt IE 9]>
    <script src="/index/js/modernizr.js"></script>
    <![endif]-->
</head>
@show
@section('nav')
<body>
<header>
    <div class="logo">个人博客</div>
    <div class="top-nav">
        <h2 id="mnavh"><span class="navicon"></span></h2>
        <ul id="nav">
            @foreach($nav_data as $k=>$v)
                <li><a href="{{$v->nav_url}}"  style="color: #ffffff">{{$v->nav_name}}</a></li>
            @endforeach
        </ul>
    </div>
    <div class="search">
        <form action="/e/search/index.php" method="post" name="searchform" id="searchform">
            <input name="keyboard" id="keyboard" class="input_text" value="搜索你喜欢的" style="color: rgb(153, 153, 153);" onfocus="if(value=='搜索你喜欢的'){this.style.color='#000';value=''}" onblur="if(value==''){this.style.color='#999';value='搜索你喜欢的'}" type="text">
            <input name="show" value="title" type="hidden">
            <input name="tempid" value="1" type="hidden">
            <input name="tbname" value="news" type="hidden">
            <input name="Submit" class="input_submit" value="" type="submit">
        </form>
    </div>
</header>
@show
@section('left')
<aside class="side">
    <div class="about"> <i><a href="/"><img src="/images/indexlogo.jpg"></a></i>
        <p>个人介绍</p>
    </div>
    <div class="weixin"> <img src="/images/indexlogo.jpg">
        <p>关注我 么么哒！</p>
    </div>
</aside>
@show

<main>
    <div class="main-content">
        @section('content')

        @show
        @section('bottom')
        <div class="blank"></div>
        <div class="links">
            <h2 class="linktitle">合作伙伴</h2>
            <ul class="link-pic">
                <li><a href="/"><img src="/index/images/yqlj.png"></a></li>
                <li><a href="/"><img src="/index/images/yqlj.png"></a></li>
                <li><a href="/"><img src="/index/images/yqlj.png"></a></li>
                <li><a href="/"><img src="/index/images/yqlj.png"></a></li>
                <li><a href="/"><img src="/index/images/yqlj.png"></a></li>
            </ul>
            <ul class="link-text">
                <li><a href="http://www.yangqq.com">杨青个人博客</a></li>
                <li><a href="http://www.yangqq.com">杨青个人博客</a></li>
                <li><a href="http://www.yangqq.com">杨青个人博客</a></li>
                <li><a href="http://www.yangqq.com">杨青个人博客</a></li>
                <li><a href="http://www.yangqq.com">杨青个人博客</a></li>
            </ul>
        </div>
        @show
        <div class="copyright">
            <p>Copyright 2018  Inc. AllRights Reserved. Design by <a href="/">郝凯个人博客</a> 蜀ICP备11002373号-1</p>
        </div>
    </div>
</main>
<a href="#" class="cd-top cd-is-visible">Top</a>
</body>
</html>

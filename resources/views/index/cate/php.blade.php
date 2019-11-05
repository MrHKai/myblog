@extends('layouts.indexCommon')

@section('content')
    <div class="welcome"> 您好，欢迎您访问我们的官方网站！ </div>
    <div class="picbox">
        <h2 class="pictitle"><a href="/">个人博客网站模板</a></h2>
        <!--box begin-->
        <div class="Box_con"> <span class="btnl btn" id="btnl"></span> <span class="btnr btn" id="btnr"></span>
            <div class="conbox" id="BoxUl">
                <ul>
                    <li class="cur"><a href="/"><img src="http://www.yangqq.com/d/file/news/humor/2014-01-13/67ce0f90b72e884e562d3360575ab3c3.jpg" alt=""/>
                            <p>如何快速建立自己的个人博客网站1</p>
                        </a> </li>
                    <li class="cur"><a href="/"><img src="http://www.yangqq.com/d/file/news/life/2018-04-27/762f99f369ae786f970477feeb3b9d77.jpg" alt=""/>
                            <p>如何快速建立自己的个人博客网站2</p>
                        </a> </li>
                    <li class="cur"><a href="/"><img src="http://www.yangqq.com/d/file/news/life/2018-06-17/917d732926d79cc2ae1012831ce51d1e.jpg" alt=""/>
                            <p>如何快速建立自己的个人博客网站3</p>
                        </a> </li>
                    <li class="cur"><a href="/"><img src="http://www.yangqq.com/d/file/jstt/bj/2018-06-29/3f0b6da48a6fd4e626a021ff7bd0d74f.jpg" alt=""/>
                            <p>如何快速建立自己的个人博客网站4</p>
                        </a> </li>
                    <li class="cur"><a href="/"><img src="http://www.yangqq.com/d/file/news/life/2018-06-29/75842f4d1e18d692a66c38eb172a40ab.jpg" alt=""/>
                            <p>如何快速建立自己的个人博客网站5</p>
                        </a> </li>
                    <li class="cur"><a href="/"><img src="http://www.yangqq.com/d/file/news/s/2014-06-14/072f267a54748c6e71d40a2d03978993.jpg" alt=""/>
                            <p>如何快速建立自己的个人博客网站6</p>
                        </a> </li>
                    <li class="cur"><a href="/"><img src="http://www.yangqq.com/d/file/blogs/2018-08-22/28e3bbca2ae0205f641a9072ecb7c100.jpg" alt=""/>
                            <p>如何快速建立自己的个人博客网站7</p>
                        </a> </li>
                    <li class="cur"><a href="/"><img src="http://www.yangqq.com/d/file/blogs/2018-08-17/3ee0644472fa8556562ab3d8716b5316.jpg" alt=""/>
                            <p>如何快速建立自己的个人博客网站8</p>
                        </a> </li>
                </ul>
            </div>
        </div>
        <!--box end-->
    </div>
    <div class="newsbox">
        @foreach($cate_data as $k=>$v)
            <section>
                <div class="news">
                    <h2 class="newstitle"><span><a href="/">更多</a></span><b>{{$v->cate_name}}</b></h2>
                    <ul>
                        <li><a href="/"><span>08-30</span>如何快速建立自己的个人博客网站</a></li>
                        <li><a href="/"><span>08-30</span>个人博客，属于我的小世界！</a></li>
                        <li><a href="/"><span>08-30</span>网易博客关闭，何不从此开始潇洒行走江湖！</a></li>
                    </ul>
                </div>
            </section>
        @endforeach
    </div>
@endsection
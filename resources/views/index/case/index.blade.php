@extends('layouts.indexCommon')
@section('body')
    <div class="fly-case-header">
        <p class="fly-case-year">2017</p>
        <a href="/case//">
            <img class="fly-case-banner" src="../../res/images/case.png" alt="发现 Layui 年度最佳案例">
        </a>
        <div class="fly-case-btn">
            <a href="javascript:;" class="layui-btn layui-btn-big fly-case-active" data-type="push">提交案例</a>
            <a href="" class="layui-btn layui-btn-primary layui-btn-big">我的案例</a>

            <a href="http://fly.layui.com/jie/11996/" target="_blank" style="padding: 0 15px; text-decoration: underline">案例要求</a>
        </div>
    </div>

    <div class="fly-main" style="overflow: hidden;">

        <div class="fly-tab-border fly-case-tab">
    <span>
      <a href="" class="tab-this">2017年度</a>
      <a href="">2016年度</a>
    </span>
        </div>
        <div class="layui-tab layui-tab-brief">
            <ul class="layui-tab-title">
                <li class="layui-this"><a href="">按提交时间</a></li>
                <li><a href="">按点赞排行</a></li>
            </ul>
        </div>

        <ul class="fly-case-list">
            <li data-id="123">
                <a class="fly-case-img" href="http://fly.layui.com/" target="_blank" >
                    <img src="../../res/images/fly.jpg" alt="Fly社区">
                    <cite class="layui-btn layui-btn-primary layui-btn-small">去围观</cite>
                </a>
                <h2><a href="http://fly.layui.com/" target="_blank">Fly社区</a></h2>
                <p class="fly-case-desc">Fly 社区是 layui 的官方社区，全站的前端层面基于 Layui 风格编写，轻量而简洁，并且模版已经开源，可用于极简社区模板。</p>
                <div class="fly-case-info">
                    <a href="../user/home.html" class="fly-case-user" target="_blank"><img src="https://tva1.sinaimg.cn/crop.0.0.118.118.180/5db11ff4gw1e77d3nqrv8j203b03cweg.jpg"></a>
                    <p class="layui-elip" style="font-size: 12px;"><span style="color: #666;">贤心</span> 2017-11-30</p>
                    <p>获得<a class="fly-case-nums fly-case-active" href="javascript:;" data-type="showPraise" style=" padding:0 5px; color: #01AAED;">666</a>个赞</p>
                    <button class="layui-btn layui-btn-primary fly-case-active" data-type="praise">点赞</button>
                    <!-- <button class="layui-btn  fly-case-active" data-type="praise">已赞</button> -->
                </div>
            </li>
            <li data-id="123">
                <a class="fly-case-img" href="http://fly.layui.com/" target="_blank" >
                    <img src="../../res/images/fly.jpg" alt="Fly社区">
                    <cite class="layui-btn layui-btn-primary layui-btn-small">去围观</cite>
                </a>
                <h2><a href="http://fly.layui.com/" target="_blank">Fly社区</a></h2>
                <p class="fly-case-desc">Fly 社区是 layui 的官方社区，全站的前端层面基于 Layui 风格编写，轻量而简洁，并且模版已经开源，可用于极简社区模板。</p>
                <div class="fly-case-info">
                    <a href="../user/home.html" class="fly-case-user" target="_blank"><img src="https://tva1.sinaimg.cn/crop.0.0.118.118.180/5db11ff4gw1e77d3nqrv8j203b03cweg.jpg"></a>
                    <p class="layui-elip" style="font-size: 12px;"><span style="color: #666;">贤心</span> 2017-11-30</p>
                    <p>获得<a class="fly-case-nums fly-case-active" href="javascript:;" data-type="showPraise" style=" padding:0 5px; color: #01AAED;">666</a>个赞</p>
                    <button class="layui-btn  fly-case-active" data-type="praise">已赞</button>
                </div>
            </li>
            <li data-id="123">
                <a class="fly-case-img" href="http://fly.layui.com/" target="_blank" >
                    <img src="../../res/images/fly.jpg" alt="Fly社区">
                    <cite class="layui-btn layui-btn-primary layui-btn-small">去围观</cite>
                </a>
                <h2><a href="http://fly.layui.com/" target="_blank">Fly社区</a></h2>
                <p class="fly-case-desc">Fly 社区是 layui 的官方社区，全站的前端层面基于 Layui 风格编写，轻量而简洁，并且模版已经开源，可用于极简社区模板。</p>
                <div class="fly-case-info">
                    <a href="../user/home.html" class="fly-case-user" target="_blank"><img src="https://tva1.sinaimg.cn/crop.0.0.118.118.180/5db11ff4gw1e77d3nqrv8j203b03cweg.jpg"></a>
                    <p class="layui-elip" style="font-size: 12px;"><span style="color: #666;">贤心</span> 2017-11-30</p>
                    <p>获得<a class="fly-case-nums fly-case-active" href="javascript:;" data-type="showPraise" style=" padding:0 5px; color: #01AAED;">666</a>个赞</p>
                    <button class="layui-btn layui-btn-primary fly-case-active" data-type="praise">点赞</button>
                    <!-- <button class="layui-btn  fly-case-active" data-type="praise">已赞</button> -->
                </div>
            </li>
            <li data-id="123">
                <a class="fly-case-img" href="http://fly.layui.com/" target="_blank" >
                    <img src="../../res/images/fly.jpg" alt="Fly社区">
                    <cite class="layui-btn layui-btn-primary layui-btn-small">去围观</cite>
                </a>
                <h2><a href="http://fly.layui.com/" target="_blank">Fly社区</a></h2>
                <p class="fly-case-desc">Fly 社区是 layui 的官方社区，全站的前端层面基于 Layui 风格编写，轻量而简洁，并且模版已经开源，可用于极简社区模板。</p>
                <div class="fly-case-info">
                    <a href="../user/home.html" class="fly-case-user" target="_blank"><img src="https://tva1.sinaimg.cn/crop.0.0.118.118.180/5db11ff4gw1e77d3nqrv8j203b03cweg.jpg"></a>
                    <p class="layui-elip" style="font-size: 12px;"><span style="color: #666;">贤心</span> 2017-11-30</p>
                    <p>获得<a class="fly-case-nums fly-case-active" href="javascript:;" data-type="showPraise" style=" padding:0 5px; color: #01AAED;">666</a>个赞</p>
                    <button class="layui-btn layui-btn-primary fly-case-active" data-type="praise">点赞</button>
                    <!-- <button class="layui-btn  fly-case-active" data-type="praise">已赞</button> -->
                </div>
            </li>
            <li data-id="123">
                <a class="fly-case-img" href="http://fly.layui.com/" target="_blank" >
                    <img src="../../res/images/fly.jpg" alt="Fly社区">
                    <cite class="layui-btn layui-btn-primary layui-btn-small">去围观</cite>
                </a>
                <h2><a href="http://fly.layui.com/" target="_blank">Fly社区</a></h2>
                <p class="fly-case-desc">Fly 社区是 layui 的官方社区，全站的前端层面基于 Layui 风格编写，轻量而简洁，并且模版已经开源，可用于极简社区模板。</p>
                <div class="fly-case-info">
                    <a href="../user/home.html" class="fly-case-user" target="_blank"><img src="https://tva1.sinaimg.cn/crop.0.0.118.118.180/5db11ff4gw1e77d3nqrv8j203b03cweg.jpg"></a>
                    <p class="layui-elip" style="font-size: 12px;"><span style="color: #666;">贤心</span> 2017-11-30</p>
                    <p>获得<a class="fly-case-nums fly-case-active" href="javascript:;" data-type="showPraise" style=" padding:0 5px; color: #01AAED;">666</a>个赞</p>
                    <button class="layui-btn layui-btn-primary fly-case-active" data-type="praise">点赞</button>
                    <!-- <button class="layui-btn  fly-case-active" data-type="praise">已赞</button> -->
                </div>
            </li>
            <li data-id="123">
                <a class="fly-case-img" href="http://fly.layui.com/" target="_blank" >
                    <img src="../../res/images/fly.jpg" alt="Fly社区">
                    <cite class="layui-btn layui-btn-primary layui-btn-small">去围观</cite>
                </a>
                <h2><a href="http://fly.layui.com/" target="_blank">Fly社区</a></h2>
                <p class="fly-case-desc">Fly 社区是 layui 的官方社区，全站的前端层面基于 Layui 风格编写，轻量而简洁，并且模版已经开源，可用于极简社区模板。</p>
                <div class="fly-case-info">
                    <a href="../user/home.html" class="fly-case-user" target="_blank"><img src="https://tva1.sinaimg.cn/crop.0.0.118.118.180/5db11ff4gw1e77d3nqrv8j203b03cweg.jpg"></a>
                    <p class="layui-elip" style="font-size: 12px;"><span style="color: #666;">贤心</span> 2017-11-30</p>
                    <p>获得<a class="fly-case-nums fly-case-active" href="javascript:;" data-type="showPraise" style=" padding:0 5px; color: #01AAED;">666</a>个赞</p>
                    <button class="layui-btn layui-btn-primary fly-case-active" data-type="praise">点赞</button>
                    <!-- <button class="layui-btn  fly-case-active" data-type="praise">已赞</button> -->
                </div>
            </li>
            <li data-id="123">
                <a class="fly-case-img" href="http://fly.layui.com/" target="_blank" >
                    <img src="../../res/images/fly.jpg" alt="Fly社区">
                    <cite class="layui-btn layui-btn-primary layui-btn-small">去围观</cite>
                </a>
                <h2><a href="http://fly.layui.com/" target="_blank">Fly社区</a></h2>
                <p class="fly-case-desc">Fly 社区是 layui 的官方社区，全站的前端层面基于 Layui 风格编写，轻量而简洁，并且模版已经开源，可用于极简社区模板。</p>
                <div class="fly-case-info">
                    <a href="../user/home.html" class="fly-case-user" target="_blank"><img src="https://tva1.sinaimg.cn/crop.0.0.118.118.180/5db11ff4gw1e77d3nqrv8j203b03cweg.jpg"></a>
                    <p class="layui-elip" style="font-size: 12px;"><span style="color: #666;">贤心</span> 2017-11-30</p>
                    <p>获得<a class="fly-case-nums fly-case-active" href="javascript:;" data-type="showPraise" style=" padding:0 5px; color: #01AAED;">666</a>个赞</p>
                    <button class="layui-btn layui-btn-primary fly-case-active" data-type="praise">点赞</button>
                    <!-- <button class="layui-btn  fly-case-active" data-type="praise">已赞</button> -->
                </div>
            </li>
            <li data-id="123">
                <a class="fly-case-img" href="http://fly.layui.com/" target="_blank" >
                    <img src="../../res/images/fly.jpg" alt="Fly社区">
                    <cite class="layui-btn layui-btn-primary layui-btn-small">去围观</cite>
                </a>
                <h2><a href="http://fly.layui.com/" target="_blank">Fly社区</a></h2>
                <p class="fly-case-desc">Fly 社区是 layui 的官方社区，全站的前端层面基于 Layui 风格编写，轻量而简洁，并且模版已经开源，可用于极简社区模板。</p>
                <div class="fly-case-info">
                    <a href="../user/home.html" class="fly-case-user" target="_blank"><img src="https://tva1.sinaimg.cn/crop.0.0.118.118.180/5db11ff4gw1e77d3nqrv8j203b03cweg.jpg"></a>
                    <p class="layui-elip" style="font-size: 12px;"><span style="color: #666;">贤心</span> 2017-11-30</p>
                    <p>获得<a class="fly-case-nums fly-case-active" href="javascript:;" data-type="showPraise" style=" padding:0 5px; color: #01AAED;">666</a>个赞</p>
                    <button class="layui-btn layui-btn-primary fly-case-active" data-type="praise">点赞</button>
                    <!-- <button class="layui-btn  fly-case-active" data-type="praise">已赞</button> -->
                </div>
            </li>
        </ul>

        <!-- <blockquote class="layui-elem-quote layui-quote-nm">暂无数据</blockquote> -->

        <div style="text-align: center;">
            <div class="laypage-main">
                <span class="laypage-curr">1</span>
                <a href="">2</a><a href="">3</a>
                <a href="">4</a>
                <a href="">5</a>
                <span>…</span>
                <a href="" class="laypage-last" title="尾页">尾页</a>
                <a href="" class="laypage-next">下一页</a>
            </div>
        </div>

    </div>
@endsection
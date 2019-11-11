@extends('layouts.indexCommon')

@section('content')
    <style>
        .site-table {
            border: 1px solid black;
            width: 820px;height: 820px;
            margin-left: 27%;
            border-collapse: collapse;
            background-color: #e7ca96;
        }
        td{
            border: 1px solid black;
            width: 50px;
        }
        tr{
            height: 50px;
        }
        .picbox {
            background-image: url("/images/timg2.jpg");
            background-repeat: no-repeat;   //不重复
            background-size: 100% 100%;     // 满屏
        }
    </style>
    <div class="picbox">
        <table class="site-table" >
            @foreach($tr as $k=>$v)
                <tr>
                    @foreach($td as $key=>$val)
                        <td site="{{$v}}-{{$val}}"></td>
                    @endforeach
                </tr>
            @endforeach
        </table>
    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script>
        $(document).ready(function(){
            var init = 1;       // 初始化 1
            // td加点击事件
            $("td").click(function(){
                if($(this).css("background-color")=="rgb(255, 255, 255)"){
                    //该位置已经下了白棋子
                    //$(this).css({"background-color":"#868686","border-radius":"0px 0px 0px 0px"});
                    return false;
                }
                if($(this).css("background-color")=="rgb(0, 0, 0)"){
                    //该位置已经下了黑棋子
                    return false;
                }
                init++;
                if(init%2==1){
                    //奇数(黑棋)
                    $(this).css({"background-color":"black","border-radius":"24px 24px 24px 24px"});
                    $(this).html('<img src="/images/heiqi.gif" width="50px;" height="49px;">');
                }else{
                    //偶数(白棋)
                    $(this).css({"background-color":"white","border-radius":"24px 24px 24px 24px"});
                    $(this).html('<img src="/images/baiqi.gif" width="50px;" height="49px;">');
                }
                var this_site = $(this).attr('site');

                // 判断是否五个相连的棋子
                checkWinOrNot(this_site,$(this));
            })
        })
        // 判断是否五个相连的棋子
        function checkWinOrNot(this_site,obj) {
            var this_site_array = this_site.split('-');     //当前位置数组
            var this_color = obj.css("background-color");   //当前颜色

            // 横向判断,取前后4个位置,连同自身位置，一共9个位置
            var across_array  = new Array();            // 横向数组
            var check_across_array = new Array();       // 验证横向数组

            for(var across = 4; across >= -4; across--){
                // this_site_array[0] 是行的位置 this_site_array[1] 是列的位置
                // 如果当前行减去 4 大于0 并且 当前行减去 4 <=15 确保是棋盘上的位置
                if(this_site_array[0] - across > 0 && this_site_array[0]-across<=15){
                    across_array.push(this_site_array[0]-across+'-'+this_site_array[1]);
                }
            }
            // 循环 把当前位置行的位置 存到数组中 数组的key为列
            $.each(across_array,function(index,value){
                if($('td[site="'+value+'"]').html() == $(obj).html()){
                    var across_check=value.split('-');
                    // across_check[0] ：[0] 是数组的第一个值,也就是第几列列
                    check_across_array.push(across_check[0]);
                }
            });
            // 验证是否胜利
            check_victory(
                check_across_array.length == 5 &&
                parseInt(check_across_array[0])+1 == check_across_array[1] &&
                parseInt(check_across_array[1])+1 == check_across_array[2] &&
                parseInt(check_across_array[2])+1 == check_across_array[3] &&
                parseInt(check_across_array[3])+1 == check_across_array[4]
                ,obj.html()
            );

            // 竖向判断,取前后4个位置,连同自身位置，一共9个位置 ， 与横向判断相反，横向取列，竖向取行
            var vertical_array  = new Array();            // 竖向数组
            var check_vertical_array = new Array();       // 验证竖向数组
            for(var vertical = 4;vertical >= -4;vertical--){
                if(this_site_array[1] - vertical > 0 && this_site_array[1] - vertical <=15){
                    vertical_array.push(this_site_array[0]+'-'+(this_site_array[1] - vertical));
                }
            }
            $.each(vertical_array,function(index,value){
                if($('td[site="'+value+'"]').html() == obj.html()){
                    var vertical = value.split('-');
                    check_vertical_array.push(vertical[1]);
                }
            });
            // 验证竖向
            check_victory(
                check_vertical_array.length==5 &&
                parseInt(check_vertical_array[0]) + 1 == check_vertical_array[1] &&
                parseInt(check_vertical_array[1]) + 1 == check_vertical_array[2] &&
                parseInt(check_vertical_array[2]) + 1 == check_vertical_array[3] &&
                parseInt(check_vertical_array[3]) + 1 == check_vertical_array[4] ,
                obj.html()
            );

            //左斜线判断
            var left_array = new Array();
            var checked_left_array = new Array();
            //---左斜线取前后4个位置,连同自身位置，一共9个位置
            for(var left =4;left>=-4;left--){
                if(this_site_array[1]-left>0 && this_site_array[1]-left<=15){
                    left_array.push(parseInt(this_site_array[0]-left)+'-'+(parseInt(this_site_array[1])+left));
                }
            }
            $.each(left_array,function(index,value){
                if($('td[site="'+value+'"]').html() == obj.html()){
                    var left =value.split('-');
                    checked_left_array.push(left[0]);
                }
            });

            //---判断是否为5个连续的位置
            check_victory(
                checked_left_array.length==5 &&
                parseInt(checked_left_array[0])+1==checked_left_array[1] &&
                parseInt(checked_left_array[1])+1==checked_left_array[2] &&
                parseInt(checked_left_array[2])+1==checked_left_array[3] &&
                parseInt(checked_left_array[3])+1==checked_left_array[4],
                obj.html()
            );

            // 右斜线判断
            var right_array=new Array();
            var checked_right_array=new Array();
            //---右斜线取前后4个位置,连同自身位置，一共9个位置
            for(var right =4; right >= -4;right --){
                if(this_site_array[1]-right>0 && this_site_array[1]-right<=15 && this_site_array[0]-right>0 && this_site_array[0]-right<=15){
                    right_array.push((this_site_array[0]-right)+'-'+(parseInt(this_site_array[1])-right));
                }
            }
            $.each(right_array,function(index,value){
                if($('td[site="'+value+'"]').html() == obj.html()){
                    var right = value.split('-');
                    checked_right_array.push(right[0]);
                }
            });
            //---判断是否为5个连续的位置
            check_victory(
                checked_right_array.length==5 &&
                parseInt(checked_right_array[0])+1==checked_right_array[1] &&
                parseInt(checked_right_array[1])+1==checked_right_array[2] &&
                parseInt(checked_right_array[2])+1==checked_right_array[3] &&
                parseInt(checked_right_array[3])+1==checked_right_array[4],
                obj.html()
            );
        }

        //验证是否是连续的五子
        function check_victory(result,value){
            if(result){
                if(value === '<img src="/images/baiqi.gif" width="50px;" height="49px;">'){
                    var who = '白棋';
                }else{
                    var who = '黑棋';
                }
                alert( who + '胜了！');
                if(confirm('重新开始游戏？')){
                    window.location.reload();
                }
            }
        }

    </script>
@endsection
@section('bottom')
@endsection
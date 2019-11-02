<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="/css/index.css">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="/js/jquery-form.js"></script>
</head>
<body>
    <div class="top">
        <div class="top_1">
            <div class="top_1_1"><b>lmd998.com</b></div>
            <div class="top_1_2">极速云文件中转站</div>
        </div>
        <div class="top_3"><p class="Upload">上传记录</p></div>
    </div>
    <div class="body">
        <div class="body_b"><b>lmd998.com</b></div>
        <div class="body_c">{极速云文件中转站}</div>
    </div>


    <div class="content">
        <form id="form_uploadImg" method="post" enctype="multipart/form-data">
        <div class="content_1 updateFile">
                <span class="fileinput-button">
                <span>上传文件</span>
                {{--<input type="file" id="file" name="myfile[]" />--}}
                    <input name="filesToUpload[]" id="input_multifileSelect" type="file" multiple>
            </span>
        </div>
        </form>
        <div class="content_2">或将文件拖拽到这里，最多单次十个</div>
    </div>
    <div id="div_uploadedImgs"></div>
    <div class="content_3">不得利用 lmd998 存储发布，淫秽，诈骗等违法信息。 <a href="">违法举报</a></div>
    <div class="content_4">© 2019 https://4275.com Inc.极速云文件中转站. All rights reserved. 鄂ICP备19020791号-1</div>
</body>
</html>
<script>
    $(document).ready(function() {
        $('#input_multifileSelect').on('change', function(){
            var ajax_option= {
                url: "/upload",
                type : 'post',
                success: function ( data ) {
                    console.log( data );
                    showUploadedImgs( data.uploadedFiles );

                    // 判断结果 ，追加页面元素
                }
            }
            $('#form_uploadImg').ajaxSubmit( ajax_option );
        });
    });
</script>
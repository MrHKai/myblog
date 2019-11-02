<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\GoodsModel;
use OSS\OssClient;
use OSS\Core\OssException;

class ImgController extends Controller
{
    public function upload(Request $request)
    {
        // 重组数组，子函数
        function reArrayFiles( $file_post ) {

            $file_ary = array();
            $file_count = count($file_post['name']);
            $file_keys = array_keys($file_post);

            for ($i=0; $i<$file_count; $i++) {
                foreach ($file_keys as $key) {
                    $file_ary[$i][$key] = $file_post[$key][$i];
                }
            }

            return $file_ary;
        }
        $imgFiles = $_FILES['filesToUpload']; // 与前端页面中的 input name=“filesToUpload[]” 相对应
//        print_r($imgFiles);
        $uploadedFiles = array(); // 返回值

        if(!empty($imgFiles))
        {
            $img_desc = reArrayFiles( $imgFiles );

            // 阿里云主账号AccessKey拥有所有API的访问权限，风险很高。强烈建议您创建并使用RAM账号进行API访问或日常运维，请登录 https://ram.console.aliyun.com 创建RAM账号。
            $accessKeyId = "LTAI4FxYzJWdTcyUfVbgMPVd";
            $accessKeySecret = "8955gvhq1EzazGTLjS9UoTZcu0a1Em";

            // Endpoint以杭州为例，其它Region请按实际情况填写。
            $endpoint = "oss-cn-beijing.aliyuncs.com";

            // 存储空间名称
            $bucket= "18100925";


            $destinationPath = storage_path().'/uploads/'; //public 文件夹下面建 storage/uploads 文件夹

            foreach( $img_desc as $img )
            {
                $file_name = date('YmdHis',time()).mt_rand().'.'.pathinfo( $img['name'], PATHINFO_EXTENSION );
                $save_path = $destinationPath.$file_name;

                move_uploaded_file($img['tmp_name'], $save_path);

                try {
                    $ossClient = new OssClient($accessKeyId, $accessKeySecret, $endpoint);

                    $res = $ossClient->putObject($bucket, $file_name,$img['tmp_name']);
                    print_r($res);
                    array_push( $uploadedFiles, $res );
                } catch (OssException $e) {
                    print $e->getMessage();
                }

            }
        }
//
        $allowed_extensions = ["png", "jpg", "gif"];
//        // TODO 判断文件类型
//
        return ['uploadedFiles' => $uploadedFiles ];
    }


}

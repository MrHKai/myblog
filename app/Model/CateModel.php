<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class CateModel extends Model
{
    // 分类表
    protected $table = 'blogs_cate';
    public $timestamps = false;
}

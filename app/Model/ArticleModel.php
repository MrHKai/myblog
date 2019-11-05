<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ArticleModel extends Model
{
    // 文章表
    protected $table = 'blogs_article';
    public $timestamps = false;
}

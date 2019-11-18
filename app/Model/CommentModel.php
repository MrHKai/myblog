<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class CommentModel extends Model
{
    // 评论表
    protected $table = 'blogs_comment';
    public $timestamps = false;
}

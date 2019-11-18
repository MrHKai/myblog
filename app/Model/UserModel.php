<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
    // 用户表
    protected $table = 'blogs_user';
    public $timestamps = false;
}

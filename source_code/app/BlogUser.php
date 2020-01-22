<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BlogUser extends Model
{
    protected $table = "blog_user";
    protected $fillable = ['id', 'user_id','blog_id'];
}

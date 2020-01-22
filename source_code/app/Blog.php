<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Favorite;
use App\User;
use Illuminate\Support\Facades\Auth;

class Blog extends Model
{

    protected $fillable = ['user_id', 'title', 'body', 'gps', 'country_id', 'image'];


    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function country()
    {
        return $this->belongsTo(Country::class,'country_id','id');
    }
    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable')->whereNull('parent_id');
    }

      public function favorite_to_users()
    {
        return $this->belongsToMany('App\User','blog_user','blog_id','user_id')->withTimestamps();
    }


}

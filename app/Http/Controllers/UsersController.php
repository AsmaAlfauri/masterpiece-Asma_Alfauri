<?php

namespace App\Http\Controllers;

use App\BlogUser;
use App\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Blog;
use App\Favorite;


class UsersController extends Controller
{
    public function myFavorites()
    {
        $blogs_ids= BlogUser::where('user_id', Auth::user()->id)->pluck('blog_id');
        $myFavorites = Blog::whereIn('id',$blogs_ids)->get();

        return view('users.my_favorites', compact('myFavorites'));
    }

    function delete($id)
    {
      $user =  BlogUser::where('user_id',Auth::user()->id)->where('blog_id',$id)->delete();
      return back();
    }
}

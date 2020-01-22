<?php

namespace App\Http\Controllers;

use App\Blog;
use App\BlogUser;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{

//    public function index()
//    {
//        $blogs = Auth::user()->favorite_blogs;
//        return view('users.my_favorites',compact('blogs'));
//    }


    public function add($blog)
    {

        $user = Auth::user();

        $isFavorite = $user->favorite_blogs()->where('blogs.id',$blog)->count();

        if ($isFavorite == 0)
        {
            $add_favorite = new BlogUser();
            $add_favorite->user_id = Auth::id();
            $add_favorite->blog_id = $blog;
            $add_favorite->save();
//            Toastr::success('Post successfully added to your favorite list :)','Success');
            return redirect()->back();
        } else {
            $user->favorite_blogs()->detach($blog);
            return redirect()->back();
        }
    }
}

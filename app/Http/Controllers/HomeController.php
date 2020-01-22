<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Blog;
use Log;
use Illuminate\Support\Facades\DB;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    // public function index()
    // {
    //     return view('home');
    // }

    public function index($country = null){




        if($country){
            $blogs = Blog::where('country_id',$country
            )->latest()->paginate(5);
        }else{
            $blogs = Blog::latest()->paginate(5);

        }
      return view('home',[
        'blogs' => $blogs
      ]);
      return view('home')->with('i', (request()->input('page', 1) - 1) * 5);;
    }

    public function show(Blog $blog, $id)
    {
      $blogs = Blog::where('id',$id)->get();
        // return view('showblog',compact('blogs'));
        return view('showblog')->with('blogs', $blogs);


    }

    public function admin()
    {
        return view('blogs');
    }





}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\Blog;
use DB;

class CommentController extends Controller
{

     public function __construct()
     {
         $this->middleware('auth');
     }

    public function store(Request $request)
    {
        $comment = new Comment;
        $comment->body = $request->get('comment_body');
        $comment->user()->associate($request->user());
        $blog = Blog::find($request->get('blog_id'));
        $blog->comments()->save($comment);

        return back();
    }


    public function replyStore(Request $request)
    {
        $reply = new Comment();
        $reply->body = $request->get('comment_body');
        $reply->user()->associate($request->user());
        $reply->parent_id = $request->get('comment_id');
        $blog = Blog::find($request->get('blog_id'));

        $blog->comments()->save($reply);

        return back();

    }

    public function edit($id)
    {
       $comment = Comment::find($id);
       return view('blogs.editcomment', ['comment' => $comment]);
    }

    public function update(Request $request, $id){

        $comment = Comment::find($id);
        $comment->body = $request->input('body');
        $comment->save();

        return redirect('home')

        ->with('success','Comment updated successfully');
    }


    function delete($id)
    {
        Comment::where('id',$id)->delete();
        return back();
    }



}

@extends('blogs.layout')



@section('content')
    <br>
    <div class="row">

        <div class="col-lg-12 margin-tb">

            <div class="pull-left">

            </div>

            <div class="pull-right">

                <a class="btn btn-primary" href="{{ route('blogs.index') }}"> Back</a>

            </div>

        </div>

    </div>



    <div class="row">

        <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
        
            <img src="{{ asset('uploads/blogs/' . $blog->image) }}" alt="image" class="rounded-lg" width="150px;" height="150px;"/>        
        </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>Title:</strong>

                {{ $blog->title }}

            </div>

        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>Desciption:</strong>

                {{ $blog->body }}

            </div>
            <hr>
            <p style="font-weight:bold">Comments</p>
            <hr>
            @include('partials._comment_replies', ['comments' => $blog->comments, 'blog_id' => $blog->id])
            <p style="font-weight:bold">Add comment</p>
            <form method="post" action="{{ route('comment.add') }}">
                @csrf
                <div class="form-group">
                    <input type="text" name="comment_body" class="form-control" style="width:30% ; height:20%"/>
                    <input type="hidden" name="blog_id" value="{{ $blog->id }}" />
                    
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-warning" value="Add Comment" />
                </div>
            </form>

        </div>

    </div>

@endsection
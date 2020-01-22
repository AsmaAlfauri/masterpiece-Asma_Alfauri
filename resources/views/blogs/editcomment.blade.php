@extends('blogs.layout')



@section('content')

<br>
<br>
    <div class="row">

        <div class="col-lg-12 margin-tb">

            <div class="pull-left">

                <h2>Edit Cmment</h2>

            </div>

            <div class="pull-right">

                <a class="btn btn-primary" href="{{ route('blogs.index') }}"> Back</a>

            </div>

        </div>

    </div>



    @if ($errors->any())

        <div class="alert alert-danger">

            <strong>Whoops!</strong> There were some problems with your input.<br><br>

            <ul>

                @foreach ($errors->all() as $error)

                    <li>{{ $error }}</li>

                @endforeach

            </ul>

        </div>

    @endif



    <form method="post" action="/comment/update/{{ $comment->id }}">
 
        {{ csrf_field() }}
        {{ method_field('PUT') }}

        <div class="form-group">
            <label>Comment</label>
            <input type="text" name="body" class="form-control" placeholder="Comment .." value=" {{ $comment->body }}">

            @if($errors->has('body'))
                <div class="text-danger">
                    {{ $errors->first('body')}}
                </div>
            @endif

        </div>

        <div class="form-group">
            <input type="submit" class="btn btn-info" value="Save">
        </div>

    </form>




@endsection
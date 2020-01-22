@extends('blogs.layout')



@section('content')

    <div class="row">

        <div class="col-lg-12 margin-tb">

            <div class="pull-left">

                <h2>Edit Blog</h2>

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



    <form action="{{ route('blogs.update',$blog->id) }}" method="POST"  enctype="multipart/form-data">

        {{ csrf_field() }}

        @method('PUT')



         <div class="row">

            <div class="col-xs-12 col-sm-12 col-md-12">

                <div class="form-group">

                    <strong>Title:</strong>

                    <input style="width:30% ; height:20%" type="text" name="title" value="{{ $blog->title }}" class="form-control" placeholder="Title">

                </div>

            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">

                <div class="form-group">

                    <strong>Body:</strong>

                    <textarea class="form-control" style="height:150px" name="body" placeholder="Body">{{ $blog->body }}</textarea>

                </div>

            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                <label for="country">Select Country:</label>
                <select name="country" id="country" class="form-group" required>
                    <option value="">Select</option>
                    @foreach($countries as $key => $value)
                        <option value="{{ $value }}">{{ $value->name }}</option>
                    @endforeach
                </select>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">

                <div class="form-group">

                    <strong>Gps:</strong>

                    <textarea class="form-control" style="height:50px" name="gps" placeholder="Gps"></textarea>

                </div>

            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Image</strong>
                <div class="custom-file">
                    <input name="image" class="custom-file-input" type="file" style="width:30% ; height:20%">
                    <label  class="custom-file-label">Choose photo</label>
                </div>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">

              <button type="submit" class="btn btn-primary">Submit</button>

            </div>

        </div>



    </form>



@endsection
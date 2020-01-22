
 @foreach($comments as $comment)
 <div class="display-comment">

     <strong>{{ $comment->user->name }}</strong>
     <p>{{ $comment->body }}</p>
     
     <a href="/comment/edit/{{ $comment->id }}">
     <button type="button" class="toggle btn btn-info" data-toggle="modal" data-target="#edit-modal">
        Edit
      </button>
    </a>
        
     <a href="/delete/{{ $comment->id}}">
        <button type="submit" class="btn btn-danger ">Delete</button>
    </a>
     <br>
     <br>
     <a href="" id="reply"></a>
     <form method="post" action="{{ route('reply.add') }}">
         @csrf
         <div class="form-group">
             <input type="text" name="comment_body" class="form-control" />
             <input type="hidden" name="blog_id" value="{{ $blog_id }}" />
             <input type="hidden" name="comment_id" value="{{ $comment->id }}" />
         </div>
            <div class="form-group">
             <input type="submit" class="btn btn-warning" value="Reply" />
            </div>
            <hr>
    
     </form>
     @include('partials._comment_replies', ['comments' => $comment->replies])
 </div>
@endforeach
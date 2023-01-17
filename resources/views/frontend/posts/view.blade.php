@extends('layouts.app')

@section('title',"$posts->name")

@section('meta_description',"$posts->meta_description")

@section('meta_keyword',"$posts->meta_keyword")

@section('content')

<div class="container">
<div class="row">
               <div class="col-md-9">
                    <div class="card-header">
                       <h3>{{ $posts->name }}</h3><br>
                       <p><b>{{ $posts->category->name.'/'.$posts->slug }}</b></p>
                       <p>{{ $posts->description }}</p>
                    </div>

                <div class="comment-area mt-4">
                   <div class="card card-body">
                       <h6 class="title">Leave a Comment</h6>
                         <form action="{{ route('frontend.commentSave') }}" method="post">
                           @csrf
                             <input type="hidden" name="post_slug" value="{{ $posts->slug }}"/>
                             <textarea name="comment_body" class="form-control" rows="3" required></textarea>
                             <button type="submit" class="btn btn-primary mt-3">Submit</button>
                         </form>
                   </div>
                   <div class="mt-2">
                   @if(session('message'))
                            <div class="alert alert-success">
                                  {{ session('message') }}
                            </div>
                   @endif
                   </div>
                   @forelse($posts->comments as $comment)
                   <div class="comment-container card card-body shadow-sm mt-3 mb-3">
                     <div class="detail-area">
                        <h6 class="user-name mb-1">
                            @if($comment->user)
                               {{ $comment->user->name }}
                            @endif
                            <small class="ms-3 text-primary">Commented on : {{ $comment->created_at->format('d-m-Y') }}</small>
                        </h6>
                        <p class="user-comment mb-1">
                             {{$comment->comment_body}}
                        </p>
                     </div>
                     @if(Auth::check() && Auth::id() == $comment->user_id )
                     <div>
                          <a href="" class="btn btn-success">Edit</a>
                          <button type="submit" value="{{ $comment->id }}" class="btn btn-danger deleteComment">Delete</button>
                     </div>
                     @endif
                  </div>
                  @empty
                  <div class="card card-body shadow-sm mt-3 mb-3">
                      <h6 class="text-warning">No Comments Yet.</h6>
                  </div>
                  @endforelse
    </div>
</div>


                <div class="col-md-3">
                       <h3>Advertise Here</h3>
                       <h3>Advertise Here</h3>
                       <h3>Advertise Here</h3><br/>
                       <div class="card">
                       <div class="card-header">
                       <h4 class="text-success">Latest Posts</h4>
                       </div>
                       <div class="card-body">
                       @foreach($latest_posts as $latest_post)
                       
                      <a href="{{ url('tutorial/'.$latest_post->category->slug.'/'.$latest_post->slug)}}" style="text-decoration :none;"><h3> > {{ $latest_post->name }}</h3></a>
  
                       @endforeach
                       </div>
                       </div>
                </div>
</div>
</div>
@endsection

@section('scripts')

<script>
 
$(document).ready(function() {

  $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
        //  $('.deleteCategoryBtn').click(function() {
          $(document).on('click','.deleteComment',function() {
            // let category_id = $(this).val();
            // $('#category_delete_id').val(category_id);
            // $('#deleteModal').modal('show');
            if(confirm('Are you want to delete this comment?')){
                let thisClicked=$(this);
                let comment_id=thisClicked.val();
                $.ajax({
                     type:"POST",
                     url:"/delete-comment",
                     data:{
                         'comment_id': comment_id
                     },
                     dataType: "json",
                     success: function(res){
                        if(res.status == 200){
                          thisClicked.closest('.comment-container').remove();
                          alert(res.message);
                        }

                        else{
                          alert(res.message);
                        }

                     }

                });
            }
         });
});

</script>

@endsection
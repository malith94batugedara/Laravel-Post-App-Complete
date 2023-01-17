@extends('layouts.master')

@section('title','Posts')

@section('content')

<div class="modal fade" tabindex="-1" id="deleteModal">
  <div class="modal-dialog">
    <div class="modal-content">

   <form action="{{ route('admin.deletepost') }}" method="post">
      @csrf
      <div class="modal-header">
        <h5 class="modal-title">Delete Post</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <input type="hidden" name="post_delete_id" id="post_delete_id"/>
        <h3>Are you sure want to delete this Post</h3>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-danger">Yes Delete</button>
      </div>
   </form>

    </div>
  </div>
</div>

<div class="container-fluid px-4">
    <div class="row">
                        <h1 class="mt-4">View Posts  <a href="{{ route('admin.addposts') }}" class="btn btn-primary float-end">Add Post</a></h1><br>
    </div><br>
                        @if(session('message'))
                            <div class="alert alert-success">
                                  {{ session('message') }}
                            </div>
                        @endif
                      <div class="table-responsive">
                       <table id="myDataTable" class="table table-dark">
                          <thead>
                            <tr>
                               <th>ID</th>
                               <th>Category</th>
                               <th>Post Name</th>
                               <th>Status</th>
                               <th>Action</th>
                            </tr>
                          </thead>
                           
                          <tbody>
                             @foreach($posts as $post)
                             <tr>
                               <td>{{$post->id}}</td>
                               <td>{{$post->category->name}}</td>
                               <td>{{$post->name}}</td>
                               <td>{{ $post->status == 1 ? 'Hidden' : 'Shown' ;}}</td>
                               <td>
                                   <a href="{{ route('admin.editpost',$post->id) }}" class="btn btn-success">Edit</a>
                                   <!-- <a href="{{ route('admin.deletepost',$post->id) }}" class="btn btn-danger">Delete</a> -->
                                   <button type="button" value="{{ $post->id }}" class="btn btn-danger deletePostBtn">Delete</button>
                               </td>
                             </tr>
                             @endforeach
                          </tbody>
                       </table>
                      </div>
</div>

@endsection

@section('scripts')

<script>
      $(document).ready(function() {
         //$('.deletePostBtn').click(function() {
         $(document).on('click','.deletePostBtn',function() {
            let post_id = $(this).val();
            $('#post_delete_id').val(post_id);
            $('#deleteModal').modal('show');
         });
      });
</script>


@endsection
@extends('layouts.master')

@section('title','Category')

@section('content')

<div class="modal fade" tabindex="-1" id="deleteModal">
  <div class="modal-dialog">
    <div class="modal-content">

   <form action="{{ route('admin.deletecategory') }}" method="post">
      @csrf
      <div class="modal-header">
        <h5 class="modal-title">Delete Category</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <input type="hidden" name="category_delete_id" id="category_delete_id"/>
        <h3>Are you sure want to delete this Category</h3>
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
                        <h1 class="mt-4">View Category  <a href="{{ route('admin.addcategory') }}" class="btn btn-primary float-end">Add Category</a></h1><br>
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
                               <th>Category Name</th>
                               <th>Image</th>
                               <th>Status</th>
                               <th>Action</th>
                            </tr>
                          </thead>
                           
                          <tbody>
                          @foreach($categories as $category)
                             <tr>
                               <td>{{ $category->id }}</td>
                               <td>{{ $category->name }}</td>
                               <td>
                                  <img src="{{ asset('uploads/category/'.$category->image)}}" height="50px" width="50px" alt="alt"/>
                               </td>
                               <td>{{ $category->status == 1 ? 'Hidden' : 'Shown'}}</td>
                               <td>
                                   <a href="{{ route('admin.editcategory',$category->id) }}" class="btn btn-success">Edit</a>
                                   <!-- <a href="{{ route('admin.deletecategory',$category->id) }}" class="btn btn-danger">Delete</a> -->
                                   <button type="button" value="{{ $category->id }}" class="btn btn-danger deleteCategoryBtn">Delete</button>
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
        //  $('.deleteCategoryBtn').click(function() {
          $(document).on('click','.deleteCategoryBtn',function() {
            let category_id = $(this).val();
            $('#category_delete_id').val(category_id);
            $('#deleteModal').modal('show');
         });
      });
  </script>

@endsection
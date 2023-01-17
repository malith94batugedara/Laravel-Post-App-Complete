@extends('layouts.master')

@section('title','Add Post')

@section('content')

<div class="container-fluid px-4 mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Add Post') }} <a href="{{ route('admin.posts') }}" class="btn btn-danger float-end">Back</a></div>

                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger" role="alert">
                            @foreach($errors->all() as $error)
                              <div> {{ $error }} </div>
                            @endforeach
                        </div>
                    @endif

                    <form action="{{ route('admin.addposts') }}" method="post" enctype="multipart/form-data">
                        @csrf
                            <div class="form-group">
                              <label for="category">Category</label>
                              <select name="category_id" class="form-control">
                                @foreach($category as $cateitem)
                                  <option value="{{ $cateitem->id }}">{{ $cateitem->name }}</option>
                                @endforeach
                              </select>
                            </div><br>
                            <div class="form-group">
                              <label for="name">Post Name</label>
                              <input type="text" class="form-control" name="name" placeholder="Enter Post Name" >
                            </div><br>
                            <div class="form-group">
                              <label for="slug">Slug</label>
                              <input type="text" class="form-control" name="slug" placeholder="Enter Slug Name" >
                            </div><br>
                            <div class="form-group">
                              <label for="description">Description</label>
                              <textarea name="description" id="my_summernote" class="form-control" placeholder="Enter Description" rows="3"></textarea>
                            </div><br>
                            <div class="form-group">
                              <label for="yt_iframe">Youtube Iframe Link</label>
                              <input type="text" class="form-control" name="yt_iframe">
                            </div><br>
                            <div class="form-group">
                              <label for="meta_title">Meta Title</label>
                              <input type="text" class="form-control" name="meta_title" placeholder="Enter Meta Title">
                            </div><br>
                            <div class="form-group">
                              <label for="meta_description">Meta Description</label>
                              <textarea name="meta_description" class="form-control" placeholder="Enter Meta Description" rows="3" ></textarea>
                            </div><br>
                            <div class="form-group">
                              <label for="meta_keyword">Meta Keyword</label>
                              <textarea name="meta_keyword" class="form-control" placeholder="Enter Meta Keyword" rows="3"></textarea>
                            </div><br>
                            <h5>Status Mode</h5>
                            <div class="row">
                            <div class="form-group col-md-3">
                              <label for="status">Status</label>&nbsp
                              <input type="checkbox" name="status"/>
                            </div>
                            </div><br>
                            <button type="submit" class="btn btn-primary">Save Post</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
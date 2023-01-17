@extends('layouts.master')

@section('title','View Settings')

@section('content')

<div class="container-fluid px-4 mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Settings') }}</div>

                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger" role="alert">
                            @foreach($errors->all() as $error)
                              <div> {{ $error }} </div>
                            @endforeach
                        </div>
                    @endif
                    @if(session('message'))
                            <div class="alert alert-success">
                                  {{ session('message') }}
                            </div>
                    @endif
                    <form action="{{ route('admin.settings') }}" method="post" enctype="multipart/form-data">
                        @csrf
                            <div class="form-group">
                              <label for="website_name">Website Name</label>
                              <input type="text" class="form-control" name="website_name" @if($setting)value="{{ $setting->website_name }}"@endif placeholder="Enter Website Name">
                            </div><br>
                            <div class="form-group">
                              <label for="website_logo">Website Logo</label>
                              <input type="file" class="form-control" name="website_logo"><br>
                              @if($setting)
                                 <img src="{{ asset('uploads/settings/'.$setting->logo) }}" height="100px" width="100px" alt=""/>
                              @endif 
                            </div><br>
                            <div class="form-group">
                              <label for="website_favicon">Website Favicon</label>
                              <input type="file" class="form-control" name="website_favicon"><br>
                              @if($setting)
                                 <img src="{{ asset('uploads/settings/'.$setting->favicon) }}" height="100px" width="100px" alt=""/>
                              @endif 
                            </div><br>
                            <div class="form-group">
                              <label for="description">Description</label>
                              <textarea name="description" class="form-control" placeholder="Enter Description" rows="3">@if($setting){{ $setting->description }}@endif</textarea>
                            </div><br>
                            <h4>SEO Meta Tags</h4><br/>
                            <div class="form-group">
                              <label for="meta_title">Meta Title</label>
                              <input type="text" class="form-control" name="meta_title" @if($setting)value="{{ $setting->meta_title }}"@endif placeholder="Enter Meta Title">
                            </div><br>
                            <div class="form-group">
                              <label for="meta_description">Meta Description</label>
                              <textarea name="meta_description" class="form-control" placeholder="Enter Meta Description" rows="3" >@if($setting){{ $setting->meta_description }}@endif</textarea>
                            </div><br>
                            <div class="form-group">
                              <label for="meta_keyword">Meta Keyword</label>
                              <textarea name="meta_keyword" class="form-control" placeholder="Enter Meta Keyword" rows="3">@if($setting){{ $setting->meta_keyword }}@endif</textarea>
                            </div><br>
                            
                            <button type="submit" class="btn btn-primary">Save Settings</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
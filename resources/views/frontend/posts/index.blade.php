@extends('layouts.app')

@section('title',"$category->name")

@section('meta_description',"$category->meta_description")

@section('meta_keyword',"$category->meta_keyword")

@section('content')

<div class="container">
<div class="row">
               <div class="col-md-9">
                    <div class="card-header">
                       <h3>{{ $category->name }}</h3>
                    </div>
               <div class="card-body">
                    @forelse($posts as $post)
               <div>
                <a href="{{ url('tutorial/'.$category->slug.'/'.$post->slug) }}" style="text-decoration: none;"><h2>{{ $post->name }}</h2></a>
                <div class="row">
                <h6><b>Posted On &nbsp {{ $post->created_at->format('d-m-Y') }} &nbsp &nbsp Posted By &nbsp {{ $post->user->name }}</b></h6>
                
                </div>
                </div>
                    @empty
                     <div>
                        <h2 class="text-danger">Posts Not Found!</h2>
                     </div>
                    @endforelse
                </div>
                <div class="your-paginate">
                    {{ $posts->links() }}
                </div>
                </div>
    
    <div class="col-md-3">
       <h3>Advertise Here</h3>
    </div>
</div>
</div>

@endsection
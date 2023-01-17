@extends('layouts.app')

@section('title',$setting->meta_title)

@section('content')

<div class="bg-danger py-5 mt-5">
  <div class="container">
    <div class="row">
       <div class="col-md-12">
           <div class="owl-carousel owl-theme">
            @foreach($all_categories as $all_category)
               <div class="item">
                <a href="{{ url('tutorial/'.$all_category->slug) }}" style="text-decoration:none;">
                   <div class="card">
                      <img src="{{ asset('uploads/category/'.$all_category->image) }}" height="300px" width="300px" alt="Image"/>
                      <div class="card-body text-center">
                          <h4 class="text-dark">{{$all_category->name}}</h4>
                      </div>
                   </div>
                </a>
               </div>
            @endforeach
           </div>
       </div>
    </div>
  </div>
</div>

<div class="py-1 bg-gray">
  <div class="container">
     <div class="border text-center p-3">
       <h3>Advertise Here</h3>
     </div>
  </div>
</div>

<div class="py-5">
  <div class="container">
     <div class="row">
       <div class="col-md-12">
           <h4>Funda Of web App</h4>
           <div class="underline"></div>
           <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Officia quis cupiditate quia ad voluptatem mollitia tenetur repudiandae commodi, repellat reiciendis non atque consequatur numquam quibusdam iusto tempora pariatur totam similique.
           Lorem ipsum, dolor sit amet consectetur adipisicing elit. Officia quis cupiditate quia ad voluptatem mollitia tenetur repudiandae commodi, repellat reiciendis non atque consequatur numquam quibusdam iusto tempora pariatur totam similique.</p>
       </div>
     </div>
  </div>
</div>

<div class="py-5 bg-gray">
  <div class="container">
     <div class="row">
       <div class="col-md-12">
           <h4>All Categories</h4>
           <div class="underline"></div>
        </div>
           @foreach($all_categories as $all_category)
           <div class="col-md-3">
                 <div class="card card-body mb-3">
                    <a href="{{ url('tutorial/'.$all_category->slug) }}" style="text-decoration:none;">
                       <h5 class="text-dark">{{ $all_category->name }}</h5>
                    </a>
                 </div>
            </div>
           @endforeach
       </div>
     </div>
  </div>
</div>

<div class="py-5 bg-white">
  <div class="container">
     <div class="row">
       <div class="col-md-12">
           <h4>Latest Posts</h4>
           <div class="underline"></div>
        </div>
        <div class="row">
        <div class="col-md-8">
           @foreach($latest_posts as $latest_post)
                 <div class="card card-body bg-gray shadow mb-3">
                    <a href="{{ url('tutorial/'.$latest_post->category->slug.'/'.$latest_post->slug) }}" style="text-decoration:none;">
                       <h5 class="text-dark">{{ $latest_post->name }}</h5>
                    </a>
                    <p class="text-white">Posted On : {{ $latest_post->created_at->format('d-m-Y') }}</p>
                 </div>
           @endforeach
        </div>
        <div class="col-md-4">
              <div class="border text-center p-3">
                  <h3>Advertise Here</h3>
              </div>
        </div>
        </div>
       </div>
     </div>
  </div>
</div>

@endsection
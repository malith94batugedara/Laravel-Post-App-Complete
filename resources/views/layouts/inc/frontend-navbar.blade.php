<div class="global-navbar">
    <div class="container mt-4">
         <div class="row">
          @php
             $setting=App\Models\Setting::find(6);
          @endphp
            <div class="col-md-3 d-none d-sm-none d-md-inline">
              @if($setting)
                 <a href="{{ route('frontend') }}"><img src="{{ asset('uploads/settings/'.$setting->logo) }}"  class="w-50" alt="Logo"/></a>
              @endif
            </div>
            <div class="col-md-9">
                <div class="border text-center p-2 mt-5">
                   <h4>Advertise Here</h4>
                </div>
            </div>
         </div>
    </div>
</div>
<div class="fixed-top">
    <nav class="navbar navbar-expand-lg navbar-dark bg-green">
  <div class="container">
    <a href="{{ route('frontend') }}" class="navbar-brand d-inline d-sm-inline d-md-none"><img src="{{ asset('assets/images/logo.jpg') }}" style="height:40px;" alt="Logo"/></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav me-auto">
      <li class="nav-item active">
        <a class="nav-link" href="{{route('frontend')}}">Home</a>
      </li>
      <!-- <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
      </li> -->
      <!-- <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Dropdown
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li> -->
      @php
          $categories=App\Models\Category::where('navbar_status',0)->where('status',0)->get();
      @endphp
      @foreach($categories as $category)
      <li class="nav-item">
        <a class="nav-link" href="{{ '/tutorial/'.$category->slug }}">{{$category->name}}</a>
      </li>
      @endforeach
      @if(Auth::guest())
      <li>
          <a class="nav-link btn-success" href="{{ route('login') }}">Login</a>
      </li>
      <li>
      @endif
      @if(Auth::check())
      <a class="nav-link btn-danger" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                    Logout
      </a>

      <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
      </form>
      @endif
      </li>  

    </ul>
  </div>
</div>
</nav>
</div>
</div>
@extends('layouts.master')

@section('title','Edit User')

@section('content')

<div class="container-fluid px-4 mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit User') }} <a href="{{ route('admin.users') }}" class="btn btn-danger float-end">Back</a></div>

                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger" role="alert">
                            @foreach($errors->all() as $error)
                              <div> {{ $error }} </div>
                            @endforeach
                        </div>
                    @endif
                     
                            <div class="form-group">
                              <label for="name">User Name</label>
                              <p class="form-control">{{$user->name}}</p>
                            </div><br>
                            <div class="form-group">
                              <label for="email">Email</label>
                              <p class="form-control">{{$user->email}}</p>
                            </div><br>
                            <div class="form-group">
                              <label for="created_at">Created At</label>
                              <p class="form-control">{{$user->created_at->format('d/m/Y')}}</p>
                            </div><br>
                       <form action="{{ route('admin.updateuser',$user->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                            
                            <div class="form-group">
                              <label for="role">User Role</label>
                              <select name="role" id="" class="form-control">
                                  <option value="1" {{ $user->role == 1 ? 'selected' : '';}}>Admin</option>
                                  <option value="0" {{ $user->role == 0 ? 'selected' : '';}}>User</option>
                                  <option value="2" {{ $user->role == 2 ? 'selected' : '';}}>Blogger</option>
                              </select>
                            </div><br>
                            
                            <button type="submit" class="btn btn-primary">Update User</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@extends('layouts.master')

@section('title','View Users')

@section('content')

<div class="container-fluid px-4">
    <div class="row">
                        <h1 class="mt-4">View Users</h1><br>
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
                               <th>Username</th>
                               <th>Email</th>
                               <th>Role</th>
                               <th>Action</th>
                            </tr>
                          </thead>
                           
                          <tbody>
                             @foreach($users as $user)
                             <tr>
                               <td>{{$user->id}}</td>
                               <td>{{$user->name}}</td>
                               <td>{{$user->email}}</td>
                               <td>{{ $user->role == 1 ? 'Admin' : 'User' ;}}</td>
                               <td>
                                   <a href="{{ route('admin.edituser',$user->id) }}" class="btn btn-success">Edit</a>
                               </td>
                             </tr>
                             @endforeach
                          </tbody>
                       </table>
                     </div>
</div>

@endsection
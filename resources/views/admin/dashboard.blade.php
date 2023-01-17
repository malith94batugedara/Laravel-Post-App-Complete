@extends('layouts.master')

@section('title','Blog Dashboard')

@section('content')

<div class="container-fluid px-4">
                        <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-info text-white mb-4">
                                    <div class="card-body text-center">Total Categories</div>
                                    <h2 class="text-center">{{ $categories }}</h2>
                                    <div class="card-footer text-center">
                                        <a class="small text-white stretched-link" href="{{ route('admin.category') }}">View Details</a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body text-center">Total Posts</div>
                                    <h2 class="text-center">{{ $posts }}</h2>
                                    <div class="card-footer text-center">
                                        <a class="small text-white stretched-link" href="{{ route('admin.posts') }}">View Details</a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body text-center">Total Users</div>
                                    <h2 class="text-center">{{ $users }}</h2>
                                    <div class="card-footer text-center">
                                        <a class="small text-white stretched-link" href="{{ route('admin.users') }}">View Details</a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-secondary text-white mb-4">
                                    <div class="card-body text-center">Total Admins</div>
                                    <h2 class="text-center">{{ $admins }}</h2>
                                    <div class="card-footer text-center">
                                        <a class="small text-white stretched-link" href="{{ route('admin.users') }}">View Details</a>
                                    </div>
                                </div>
                            </div>
</div>
</div>

@endsection
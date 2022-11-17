@extends('admin.layouts.master')
@section('title')
Dashboard | Admin Profile
@endsection
@section('content')
<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- @if(Session::has('status'))
            <div class="alert alert-info alert-dismissible fade show" role="alert">
                {{Session::get('status')}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif -->
            <div class="row">
                <div class="col-lg-8">
                    <div class="card"><br><br>
                        <center>
                            <img class="rounded-circle avatar-xl" src="{{(! empty(auth()->user()->image)) ? asset('storage/images/'. auth()->user()->name. '/'.auth()->user()->image ) : asset('backend/assets/images/users/no_image.jpg') }}" style="width: 50%; height:70%;" alt="Admin image">
                        </center>

                        <div class="card-body">
                            <h4 class="card-title">Name : {{ auth()->user()->name }} </h4>
                            <hr>
                            <h4 class="card-title">User Email : {{ auth()->user()->email }} </h4>
                            <hr>
                            <a href="{{route('profile.edit', auth()->user()->id)}}" class="btn btn-info btn-rounded waves-effect waves-light"> Edit Profile</a>
                            <a href="{{route('password.edit', auth()->user()->id)}}" class="btn btn-danger btn-rounded waves-effect waves-light"> Change Password</a>

                        </div>
                    </div>
                </div>


            </div>


        </div>
    </div>
</div>

@endsection

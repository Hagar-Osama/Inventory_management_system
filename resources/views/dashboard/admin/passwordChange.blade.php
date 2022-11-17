@extends('admin.layouts.master')
@section('title')
Dashboard | Edit Admin Password
@endsection
@section('content')
<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Change Admin Password</h4><br>
                            @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif

                            <form class="custom-validation" action="{{route('password.change')}}" method="POST">
                                @csrf
                                <input type="hidden" name="adminId" value="{{auth()->user()->id}}">
                                <div class="mb-3">
                                    <label>Current Password</label>
                                    <input type="password" name="current_password" class="form-control" required  />
                                </div>

                                <div class="mb-3">
                                    <label>New Password</label>
                                    <div>
                                        <input type="password" name="new_password" class="form-control"  parsley-type="email" required />
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label>Confirm Password</label>
                                    <div>
                                        <input type="password" name="password_confirmation" id="pass2" class="form-control" required />
                                    </div>
                                </div>
                                <div class="mb-0">
                                    <div>
                                        <button type="submit" class="btn btn-primary waves-effect waves-light me-1">
                                            Update Password
                                        </button>
                                        <button type="reset" class="btn btn-secondary waves-effect">
                                            Cancel
                                        </button>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div> <!-- end col -->
            </div>
        </div>
    </div>
</div>


@endsection

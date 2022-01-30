@extends('layouts.admin')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-4">
                    <h4 class="m-0 text-dark">Profile</h4>
                </div>
                <div class="col-sm-8">
                    <ol class="breadcrumb float-sm-right">

                        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashboard</a></li>

                        <li class="breadcrumb-item active">Profile</li>
                        
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">

        <form action="{{ route('profile.password.update') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label" for="current_password">Current Password</label>
                                <div class="col-md-8">
                                    <input type="password" name="current_password" id="current_password"
                                        class="form-control ">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-4 col-form-label" for="new_password">New Password</label>
                                <div class="col-md-8">
                                    <input type="password" name="new_password" id="new_password" class="form-control ">

                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-4 col-form-label" for="new_password_confirmation">Confirm
                                    Password</label>
                                <div class="col-md-8">
                                    <input type="password" name="new_password_confirmation" id="new_password_confirmation"
                                        class="form-control ">

                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary float-sm-right">Change Password</button>
                        </div>
                    </div>

                </div>
            </div>
        </form>
    </div>
@endsection

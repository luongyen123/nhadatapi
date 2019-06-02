@extends('layouts.auth')
@section('css')
<link rel="stylesheet" href="{{asset('../dist/css/login.css')}}">
@endsection
@section('content')
<div class="row">
    <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
    <div class="login-brand">
        Nhà đất Á châu
    </div>

    <div class="card card-primary">
        <div class="card-header"><h4>Login</h4></div>

        <div class="card-body">
        <form method="POST"  class="needs-validation" id="loginform">
            <div class="form-group">
            <label for="email">Email</label>
                <input id="email" type="email" class="form-control" name="email"  required>
            </div>

            <div class="form-group">
            <label for="password" class="d-block">Password
                <div class="float-right">
                <a href="forgot.html">
                    Forgot Password?
                </a>
                </div>
            </label>
            <input id="password" type="password" class="form-control" name="password"  required>

            </div>
            <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block" tabindex="4">
                Login
            </button>
            </div>
        </form>
        <div id="response"></div>
        </div>
    </div>
    <div class="mt-5 text-muted text-center">
        Don't have an account? <a href="/admin/register">Create One</a>
    </div>

    </div>
</div>
@endsection
@section('js')
<script src="{{asset('../dist/js/backend/jquery.validate.min.js')}}"></script>
<script src="{{asset('../dist/js/backend/additional-methods.min.js')}}"></script>
<script src = "{{asset('../dist/js/backend/login.js')}}"></script>
@endsection

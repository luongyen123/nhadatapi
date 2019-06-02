@extends('layouts.auth')
@section('css')
<link rel="stylesheet" href="{{asset('../dist/css/login.css')}}">
@endsection
@section('content')
<div class="row">
    <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
    <div class="login-brand">
       Nhà đất á châu
    </div>

    <div class="card card-primary">
        <div class="card-header"><h4>Đăng kí tài khoản</h4></div>

        <div class="card-body">
        <form method="POST" id="regisForm">
            <div class="row">
            <div class="form-group col-12">
                <label for="last_name">Name</label>
                <input id="last_name" type="text" class="form-control" name="name" required>
            </div>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input id="email" type="email" class="form-control" name="email" required>
            </div>

            <div class="row">
                <div class="form-group col-12">
                    <label for="password" class="d-block">Password</label>
                    <input id="password" type="password" class="form-control" name="password" required>
                </div>            
            </div>

           
            <div class="row">
            
            <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block">
                Register
            </button>
            </div>
        </form>
        </div>
    </div>  
    </div>
</div>
@endsection
@section('js')
<script src="{{asset('../dist/js/backend/jquery.validate.min.js')}}"></script>
<script src="{{asset('../dist/js/backend/additional-methods.min.js')}}"></script>
<script src="{{asset('../dist/js/backend/register.js')}}"></script>
@endsection
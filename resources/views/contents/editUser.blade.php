@extends('layouts.layout')
@section('title')
{{$title}}
@endsection
@section('css')
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
<link rel="stylesheet" href="{{asset('../dist/css/tinmuaban.css')}}">
@endsection
@section('content')
<?php
$user = $_COOKIE['user'];
$user = json_decode($user);
?>
<section class="section">
    <h1 class="section-header">
        <div>{{$title}}
        </div>
    </h1>
    <div class="row">
        <div class="col-lg-8 col-md-8 col-8 col-sm-8">
            <form method="POST" class="needs-validation" id="edituser" enctype="multipart/form-data">

                <div class="card">
                    <div class="card-header">
                        <h4>Thong tin user</h4>                                                
                    </div>
                    <div class="card-body">
                    <div class="form-group">
                            <label>Email<span class="require">*</span></label>
                            <input type="text" name="email" class="form-control" required value ="{{$user_edit->email}}" disabled>
                        </div>
                        <div class="form-group">
                            <label>Name<span class="require">*</span></label>
                            <input type="text" name="name_user" class="form-control" value = "{{$user_edit->name}}">
                            <input type="hidden" name="user_id"  value="{{$user_edit->id}}" id="user_id"/>
                            <input type="hidden" name="anh"  value="{{$user_edit->avartar}}" id="anh"/>
                            <input type="hidden" name="auth"  value="{{$user->id}}" id="auth"/>
                        </div>
                        <div class="form-group">
                            <label>Change Password <span class="require">(Neu thay doi mat khau thi dien vao)*</span></label>
                            <input type="password" name="password" class="form-control" id="psw" value="none">
                        </div>
                        <div class="form-group">
                            <label>Phan quyen <span class="require">*</span></label>
                            <select class="form-control" name="role">
                                 <option value="0" @if($user_edit->role == 0) selected @endif</option>Quan tri he thong</option>
                                 <option value="1"  @if($user_edit->role == 1) selected @endif>Bien tap vien</option>
                            </select>
                        </div>
                    </div>
                </div>
        </div>
        <div class="col-lg-4 col-md-4 col-4 col-sm-4">
                <div class="card text-center">
                    <div class="card-body">
                        <div class="form-group">
                            <label>Ảnh đại diện bài viết <span class="require">*</span></label>
                            <div class="avatar-upload">
                                <div class="avatar-edit">
                                    <input type='file' id="imageUpload" accept=".png, .jpg, .jpeg" name="anhdaidien"/>
                                    <label for="imageUpload"></label>
                                </div>
                                <div class="avatar-preview">
                                    <div id="imagePreview" style="background-image: url({{$user_edit->avartar}});">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-primary" type="submit">Update</button>
                    </div>
                </div>
                
            </form>
        </div>
    </div>
 </section>
@endsection
@section('js')
<script src = "{{asset('../dist/js/backend/cookie.min.js')}}"></script>
<script src = "{{asset('../dist/js/backend/editUser.js')}}"></script>
 @endsection

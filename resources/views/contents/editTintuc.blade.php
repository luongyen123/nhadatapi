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
        <div class="col-lg-9 col-md-9 col-9 col-sm-9">
            <form method="POST" class="needs-validation" id="editTintuc" enctype="multipart/form-data">
                <div class="card">
                    <div class="card-header">
                        <h4>Viết bài mới</h4>                                                
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label>Tiêu đề <span class="require">*</span></label>
                            <input type="text" name="tieude" class="form-control" required value="{{$tintuc->tieude}}">
                            <input type="hidden" name="anh" id="anh" value="{{$tintuc->anh_daidien}}" />
                            <input type="hidden" name="user_id"  value="<?php echo $user->id;?>" />
                            <input type ="hidden" name="news_id" value="{{$tintuc->id}}" id="news_id"/>                            
                        </div>
                        <div class="form-group">
                            <label>Chi tiết <span class="require">*</span></label>
                            <textarea class="summernote-simple" name="description" required >{!!$tintuc->chitiet!!}</textarea>
                        </div>
                    </div>
                </div>
        </div>
        <div class="col-lg-3 col-md-3 col-3 col-sm-3">
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
                                    <div id="imagePreview" style="background-image: url({{$tintuc->anh_daidien}});">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-primary" type="submit">Đăng bài</button>
                        </div>
                </div>
               
            </form>
        </div>
    </div>
 </section>
@endsection
@section('js')
<script src="{{asset('../ckeditor/ckeditor.js')}}"></script>
<script src = "{{asset('../dist/js/backend/cookie.min.js')}}"></script>
<script src="{{asset('../dist/js/backend/tinmuaban.js')}}"></script>
 @endsection

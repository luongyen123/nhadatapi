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
            <form method="POST" class="needs-validation" id="editnews" enctype="multipart/form-data">
                <div class="card">
                    <div class="card-header">
                        <h4>Viết bài mới</h4>                                                
                    </div>
                    <div class="card-body">
                        <div class="form-group" >
                            <label style="color:red">Chọn địa chỉ - Nếu thay đổi thì chọn lại (Còn không thì không phải chọn lại)</label>
                            <div class="row">
                                <div class="col-3 col-md-3 col-lg-3">
                                    <select class="form-control" name="tinhthanh" id="tinhthanh">
                                        <option value="">---Chọn Tỉnh Thành Phố---</option>
                                    </select> 
                                </div>
                                <div class="col-3 col-md-3 col-lg-3">
                                    <select class="form-control" name="quanhuyen" id="quanhuyenTP">
                                        <option value="">---Chọn Quận huyện---</option>
                                    </select>
                                </div>
                                <div class="col-3 col-md-3 col-lg-3">
                                    <select class="form-control" name="xaphuong" id="xaphuong">
                                        <option value="">---Chọn xã phường---</option>
                                    </select>
                                </div>
                                <div class="col-3 col-md-3 col-lg-3">
                                    <input type="text" name="vitri" class="form-control" placeholder="Nhập vào địa chỉ nhà" id="vitri" value="{{$tinmua->vitri}}">
                                </div>
                            </div>
                             <div class="row">
                                <div class="col-6 col-md-6 col-lg-6">
                                    <div class="row">
                                        <div class="col-8 col-md-8 col-lg-8">
                                            <label>Giá</label>
                                            <input type="text" name="gia" class="form-control" id="gia" value="{{$tinmua->gia}}">
                                        </div>
                                        <div class="col-4 col-md-4 col-lg-4">
                                            <label>Đơn vị tiền tệ</label>
                                            <select class="form-control" name="tiente" id="tiente">
                                                <option value="Triệu"@if($tinmua->tiente === "Triệu") selected="selected" @endif >Triệu</option>
                                                <option value="Tỷ" @if($tinmua->tiente === "Tỷ") selected="selected" @endif>Tỷ</option>
                                            </select>
                                        </div>
                                    </div>                                                                      
                                </div>
                                <div class="col-6 col-md-6 col-lg-6">
                                <div class="row">
                                        <div class="col-8 col-md-8 col-lg-8">
                                            <label>Diện tích</label>
                                            <input type="text" name="dientich" class="form-control" id="dientich" value="{{$tinmua->dientich}}">
                                        </div>
                                        <div class="col-4 col-md-4 col-lg-4">
                                            <label>Đơn vị diện tích</label>
                                            <select class="form-control" name="dvdt" id="dvdt">
                                                <option value="m2" @if($tinmua->dvdt === "m2") selected="selected" @endif >m2</option>
                                                <option value="ha" @if($tinmua->dvdt === "ha") selected="selected" @endif>ha</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                             </div>                                                      
                        </div>
                        <div class="form-group">
                            <label>Tiêu đề <span class="require">*</span></label>
                            <input type="text" name="tieude" class="form-control" required value="{{$tinmua->tieude}}">
                            <input type="hidden" name="anh" id="anh" value="{{$tinmua->anhdaidien}}" />
                            <input type="hidden" name="user_id"  value="{{$user->id}}" />
                            <input type ="hidden" name="news_id" value="{{$tinmua->id}}"/>
                            <input type="hidden" name ="matinh_id" value="{{$tinmua->matinh_id}}"/>
                            <input type="hidden" name ="maqh_id" value="{{$tinmua->maqh_id}}"/>
                            <input type="hidden" name ="maxp_id" value="{{$tinmua->maxp_id}}"/>
                        </div>
                        <div class="form-group">
                            <label>Chi tiết <span class="require">*</span></label>
                            <textarea class="summernote-simple" name="description" required >{!!$tinmua->chitiet!!}</textarea>
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
                                    <div id="imagePreview" style="background-image: url({{$tinmua->anhdaidien}});">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-primary" type="submit">Sửa bài</button>
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

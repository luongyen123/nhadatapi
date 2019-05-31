@extends('layouts.layout')
@section('title')
{{$title}}
@endsection
@section('content')
<section class="section">
    <h1 class="section-header">
      <div>{{$title}}</div>
    </h1>
    <div class="row">
      <div class="col-lg-3 col-md-6 col-12">
        <div class="card card-sm-3">
          <div class="card-icon bg-primary">
            <i class="ion ion-person"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4><a href="/admin/getUser">Số user</a></h4>
            </div>
            <div class="card-body">
              {{$number_user}}
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-12">
        <div class="card card-sm-3">
          <div class="card-icon bg-danger">
            <i class="ion ion-ios-paper-outline"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4> <a href="/admin/tinmuaban">Số tin mua bán</a></h4>
            </div>
            <div class="card-body">
              {{$number_tinmua}}
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-12">
        <div class="card card-sm-3">
          <div class="card-icon bg-warning">
            <i class="ion ion-paper-airplane"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4><a href="/admin/tintucnhadat/2">Số bài tin tức nhà đất</a></h4>
            </div>
            <div class="card-body">
              {{$number_tintuc}}
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-12">
        <div class="card card-sm-3">
          <div class="card-icon bg-success">
            <i class="ion ion-record"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4><a href="/admin/tintucnhadat/1">Dự án nổi bật</a></h4>
            </div>
            <div class="card-body">
              {{$number_tinduan}}
            </div>
          </div>
        </div>
      </div>
    </div>

</section>
@endsection

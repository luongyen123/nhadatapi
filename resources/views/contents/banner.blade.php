@extends('layouts.layout')
@section('title')
    {{$title}}
@endsection
@section('css')
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
<link rel="stylesheet" href="{{asset('../dist/css/imageUpload.css')}}">
@endsection
@section('content')
<section class="section">
    <h1 class="section-header">
        <div>{{$title}}</div>
    </h1>
    <div class="section-body">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                <div class="card-header">
                    <h4>Danh sách hình ảnh làm banner</h4>
                    <div class="row">
                            <div class="col-4 col-md-4 col-lg-4">
                                    <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Thêm banner</button>
                            </div>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                    <table class="table table-striped">
                            <tr>
                                <th>STT</th>
                                <th>Hình ảnh</th>
                                <th>Trang thai</th>
                                <th>Action</th>
                            </tr>
                        <?php $i=1;$status=""?>
                        @foreach($banner as $value)
                            <tr>
                                <td>{{$i}}</td>
                                <td><img src="{{$value->media}}" style="width:500px;height:200px;"></td>
                                <td><a href = "/admin/activeBanner/{{$value->id}}" class=" btn-action badge @if($value->status == 0){{'badge-success'}} <?php $status='Đang sử dụng'?> @else {{'badge-danger'}} <?php $status='Không được sử dụng' ?> @endif">{{$status}}</a></td>
                                <td>
                                    <a class="btn btn-danger btn-action"  title="Delete" href="/admin/delete/{{$value->id}}" onclick="return confirm('Ban chac chan muon xoa?');"><i class="ion ion-trash-b"></i></a>
                                </td>
                            </tr>
                            <?php $i++?>
                        @endforeach
                    </table>
                    {{-- {{ $users->links() }} --}}
                    </div>
                </div>
               
                </div>
            </div>
        </div>
    </div>
</section>
<div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">
      
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Thêm banner</h4>
            </div>
            <form method="POST" class="form-control" action="/admin/themBanner">
            <div class="modal-body">               
                <div class="avatar-upload">
                        <div class="avatar-edit">
                            <input type='file' id="imageUpload" accept=".png, .jpg, .jpeg" name="anhdaidien"/>
                            <label for="imageUpload"></label>
                        </div>
                        <div class="avatar-preview">
                            <div id="imagePreview" style="background-image: url({{asset('../avatars/default.jpg')}});">
                            </div>
                        </div>
                </div>
                <input type="hidden" value="" id="anh" name="media"/>         

            </div>
            <div class="modal-footer">
              <input class="btn btn-primary" type="submit" value="Thêm"/>         
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </form>
          </div>
      
        </div>
      </div>
 @endsection
 @section('js')
 <script src="{{asset('../dist/js/backend/uploadimage.js')}}"></script>
  @endsection
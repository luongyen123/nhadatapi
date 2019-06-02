@extends('layouts.frontend.layout')
@section('content')   
<div class="row content link-page ">
        <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12">
            <p id="link-page-title">
                <span>
                    <a href="/">Trang chủ</a>  →  <span>{{$tindetail->tieude}}</span>
                </span>
            </p>
        </div>
    </div>
    <div class="row contenter">
           <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
               <div class="panel">
                   <div class="row">
                    <div class="col-md-6 left-detail">
                        <img src="{{$tindetail->anhdaidien}}" height="303" width="455">
                    </div>
                    <div class="col-md-6 right-detail">
                        <h1 class="title-detail">{{$tindetail->tieude}}</h1>
                        <ul class="list-detail" style=" margin-left: -40px;">
                            <li><span class="icon"><i class="fas fa-dollar-sign"></i></span> Giá: <span class="list-detail-text-red">{{$tindetail->gia}} {{$tindetail->tiente}}</span></li>
                            <li><span class="icon"><i class="fa fa-star"></i></span> Diện tích: <span class="list-detail-text"> {{$tindetail->dientich}} {{$tindetail->dvdt}}</span></li>
                            <li><span class="icon"><i class="fa fa-map-marker"></i></span> Vị trí: <span class="list-detail-text"> {{$tindetail->vitri}}</span></li>
                            <li><span class="icon"><i class="fa fa-clock-o"></i></span> Ngày đăng: <span class="list-detail-text"> 31/05/2019</span></li>
                        </ul>
                    </div>
                </div>
                <div class="row infor-product">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ">
                        <p>
                            <span class="tin-detail text-uppercase"> THÔNG TIN LÔ ĐẤT BẠN ĐANG XEM</span>
                        </p>
                        <hr style="margin: 20px 0px 20px 0px;">
                        <p>
                                {!!$tindetail->chitiet!!}
                    </div>
                </div>
                <div class="row infor-product">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ">
                            <p>
                                <span class="tin-detail text-uppercase"> Các lô đất cùng khu vực</span>
                            </p>
                            @include('blocks.frontend.tinban')
                        </div>
                        {{ $tinban->links() }}
                </div>
            </div>
    </div>
           @include('blocks.frontend.left')
 </div>
 @endsection
@extends('layouts.frontend.layout')
@section('content')
<div class="row content link-page ">
    <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12">
        <p id="link-page-title">
            <span>
                <a href="nhadatachau.html">Trang chủ</a>  →  <span>{{$loaitin}}</span>
            </span>
        </p>
    </div>
</div>
<div class="row contenter">
    <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
        <div class="section-baiviet">
            <h1>{{$tindetail->tieude}}</h1>
            <div class="time-baiviet">
                <i>Ngày: 26/05/2019</i>
            </div>
            <div class="baiviet">
               {!!$tindetail->chitiet!!}
            </div>
            <div class="related-post">
                <h2>CÁC TIN LIÊN QUAN</h2>
                <ul class="list-related">
                    @foreach($tintuc as $tin)
                    <li>
                        <a href="/tintuc/{{$tin->slug}}"> {{$tin->tieude}}</a> <span> (25/05/2019)</span>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    @include('blocks.frontend.left')  
</div>
@endsection
@extends('layouts.frontend.layout')
@section('content')  
<div class="row content link-page ">
        <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12">
            <p id="link-page-title">
                <span>
                    <a href="/">Trang chủ</a>  →  @if(isset($title2)) <span>Nhà Đất {{$title2}}</span> @endif  → <span>Nhà Đất {{$title}}</span>
                </span>
            </p>
        </div>
</div>
    <h1 class="title-main">Nhà Đất {{$title}}</h1>
<div class="row contenter">
    <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
        <div class="panel">
            @include('blocks.frontend.tinban')
            {{ $tinban->links() }}
        </div>
    </div>
    @include('blocks.frontend.left')
 </div>
@endsection
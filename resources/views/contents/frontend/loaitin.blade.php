@extends('layouts.frontend.layout')
@section('content')
<div class="body"></div>
<div class="row content link-page ">
				<div class="col-sm-12 col-md-12 col-lg-12 col-xs-12">
					<p id="link-page-title">
						<span>
							<a href="/">Trang chủ</a>  →  <span>{{$title}}</span>
						</span>
					</p>
				</div>
</div>
<h1 class="title-main">{{$title}}</h1>
<div class="row contenter">
	<div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
		<div class="panel">
            @foreach($tintuc as $tin)
			<div class="list-post row">
				<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
					<a href="/tintuc/{{$tin->slug}}" class="post-image">
						<img width="213" height="142" src="{{$tin->anh_daidien}}">
					</a>
				</div>
				<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                    <h2 class="title-post"> <a href="/tintuc/{{$tin->slug}}">{{$tin->tieude}}</a> </h2>
                    <?php $description = substr($tin->chitiet,0,200)?>
                    {!!$description!!}
				</div>
            </div>
            @endforeach
		</div>
    </div>
    @include('blocks.frontend.left')
</div>
@endsection
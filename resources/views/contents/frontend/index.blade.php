@extends('layouts.frontend.layout')
@section('content')   
<div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Wrapper for slides -->
        <div class="carousel-inner">

          <div class="item active">
            <img src="http://nhadatachau.vn/img/banner1.jpg" alt="Los Angeles" style="width:100%;">
            <div class="carousel-caption">
              <h3>Los Angeles</h3>
              <p>LA is always so much fun!</p>
            </div>
          </div>

          <div class="item">
            <img src="http://nhadatachau.vn/img/banner1.jpg" alt="Chicago" style="width:100%;">
            <div class="carousel-caption">
              <h3>Chicago</h3>
              <p>Thank you, Chicago!</p>
            </div>
          </div>
        
          <div class="item">
            <img src="http://nhadatachau.vn/img/banner1.jpg" alt="New York" style="width:100%;">
            <div class="carousel-caption">
              <h3>New York</h3>
              <p>We love the Big Apple!</p>
            </div>
          </div>		  
          <!-- Indicators -->
          <ol class="carousel-indicators">
              <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
              <li data-target="#myCarousel" data-slide-to="1"></li>
              <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>
 </div>

<div class="row content">
        <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
            
            <div class="panel">
                <div class="panel-heading text-uppercase header" id="duan">							
                        <h3 class="panel-title">Tin mua bán dành cho bạn</h3>							 
                </div>
                <div class="body">
                    
                </div>
                @include('blocks.frontend.tinban')
                <div class="buttom-xt">
                        {{ $tinban->links() }}
                </div>
            </div>
        </div>
        @include('blocks.frontend.left')
   
</div>
@endsection
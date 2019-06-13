@extends('layouts.frontend.layout')
@section('css')
@endsection
@section('content')   
<div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Wrapper for slides -->
        <div class="carousel-inner">
          @if($banner_first != null)
          <div class="item active">
            <img src="{{$banner_first->media}}" alt="Los Angeles" style="width:100%;">
            <div class="carousel-caption">
              <h3>Los Angeles</h3>
              <p>LA is always so much fun!</p>
            </div>
          </div>
          @endif
          @foreach($banner as $value)
          <div class="item">
            <img src="{{$value->media}}" alt="Chicago" style="width:100%;">
            <div class="carousel-caption">
              <h3>Chicago</h3>
              <p>Thank you, Chicago!</p>
            </div>
          </div>
          @endforeach	  
          <!-- Indicators -->
          <ol class="carousel-indicators">
              <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
              <?php $i=1;?>
              @foreach($banner as $value)
                <li data-target="#myCarousel" data-slide-to="{{$i}}"></li>
                <?php $i++;?>
              @endforeach
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
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-md">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title text-uppercase text-center">Đăng kí mua bán nhà đất</h4>
      </div>
      <form action="" method="POST" id="addInfo">
        <div class="modal-body">
          <p>Nhà đất Á Châu - Cam kết bán đúng giá, hoàn toàn miễn phí tư vấn</p>
          <p>Xin cảm ơn!</p>         
          <div class="form-group">
            <input type="text" class="form-control record" id="hoten" name="hoten" placeholder="Họ và tên" required>
          </div>
          <div class="form-group">
            <input type="text" class="form-control record" id="sdt" name="sdt" placeholder="Số điện thoại của bạn" required>
          </div>
          <div class="form-group">
            <label  class="control-label">Cần mua hoặc bán</label><br>
            <div class="col-md-6">
                <label><input type="checkbox" name="nhucau" value="muadat"> Mua đất</label>
            </div>
            <div class="col-md-6">
                <label><input type="checkbox" name="nhucau" value="bandat"> Bán đất</label>
            </div>
            
          </div> 
          <div class="form-group">
              <label for="comment">Ghi chú:</label>
              <textarea class="form-control" rows="5" id="comment" name="ghichu" placeholder="Tôi cần lô đất khu 31ha Trâu Quỳ. Liên hệ tôi qua số 0912719896" required></textarea>
            </div>       
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-default">Submit</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        
        </div>
      </form>
    </div>

  </div>
</div>
@endsection
@section('js')
<script>
  $(window).load(function(){        
    $('#myModal').modal('show');
     }); 
</script>
<script src="{{asset('../dist/js/backend/jquery.validate.min.js')}}"></script>
<script src="{{asset('../dist/js/backend/additional-methods.min.js')}}"></script>
<script src = "{{asset('../dist/js/addInfo.js')}}"></script>
@endsection

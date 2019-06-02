@extends('layouts.layout')
@section('title')
    {{$title}}
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
                        <h4>Danh sách xã phường</h4>
                        <div class="row">
                                <div class="col-4 col-md-4 col-lg-4">
                                    <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Thêm xã phường</button>
                                </div>
                                <div class="col-4 col-md-4 col-lg4">
                                    <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#themQuanhuyen">Thêm quận huyện</button>                            
                                </div>
                                <div class="col-4 col-md-4 col-lg4">
                                        <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#themTinh">Thêm tỉnh thành</button>                            
                                </div>
                        </div>
                    </div>
                <div class="card-body p-0">
                    
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <tr>
                                <th>STT</th>
                                <th>Xa phuong</th>
                                <th>Quan Huyen</th>
                                <th>Tinh thanh</th>
                                <th>Action</th>
                            </tr>
                            <?php $i=1; ?>
                            @foreach($data as $value)
                                <tr>
                                    <td>{{$i}}</td>
                                    <td>{{$value->tenxa}}</td>
                                    <td>{{$value->tenqh}}</td>
                                    <td>{{$value->tentinhtp}}</td>
                                    <td><a href="#" class="btn btn-action btn-secondary">Detail</a></td>
                                </tr>
                            <?php $i++;?>
                            @endforeach
                        </table>
                    {{ $data->links() }}
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Them xa phuong -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Thêm xã phường</h4>
      </div>
      <form method="POST" class="form-control" action="/admin/themXaphuong">
      <div class="modal-body">               
            <select class="form-control tinhthanh" name="tinhthanh" id="tinhthanh" required>
                <option value="">---Chọn Tỉnh Thành Phố---</option>
            </select>  
            <br>                   
            <select class="form-control quanhuyen" name="maqh" id="quanhuyenTP" required>
                <option value="">---Chọn Quận huyện---</option>
            </select>
            <br> 
            <select class="form-control" name="type" required>
                    <option value="Thị trấn">Thị trấn</option>
                    <option value="Xã">Xã</option>
                    <option value="Phường">Phường</option>
                </select>                  
            <input type="text" name="tenxa" class="form-control" placeholder="Nhập ten xa phuong" required>                                     
      </div>
      <div class="modal-footer">
        <input class="btn btn-primary" type="submit" value="Thêm"/>         
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </form>
    </div>

  </div>
</div>
<!-- Them Quan huyen -->
<div id="themQuanhuyen" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Thêm Quận Huyện</h4>
      </div>
      <form method="POST" class="form-control" action="/admin/themQuanhuyen">
      <div class="modal-body">               
            <select class="form-control tinhthanh" name="matinh" required>
                <option value="">---Chọn Tỉnh Thành Phố---</option>
            </select>  
            <br>                   
            <select class="form-control" name="type" required>
                    <option value="Quận">Quận</option>
                    <option value="Huyện">Huyện</option>
                    <option value="Thành Phố">Thành Phố</option>
                </select>                  
            <input type="text" name="tenqh" class="form-control" placeholder="Nhập tên Quận huyện" required>                                     
      </div>
      <div class="modal-footer">
        <input class="btn btn-primary" type="submit" value="Thêm"/>         
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </form>
    </div>

  </div>
</div>
<!-- Them Quan huyen -->
<div id="themTinh" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Thêm Tỉnh TP</h4>
      </div>
      <form method="POST" class="form-control" action="/admin/themTinh">
      <div class="modal-body">                               
            <select class="form-control" name="type" required>
                    <option value="Tỉnh">Tỉnh</option>
                    <option value="Thành Phố">Thành Phố</option>
                </select>  
                <br>                
            <input type="text" name="tentinhtp" class="form-control" placeholder="Nhập tên Quận huyện" required>                                     
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
 <script src="{{asset('../dist/js/backend/quanhuyen.js')}}"></script>
 @endsection

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
                                    <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Thêm loại tin</button>
                                </div>
                        </div>
                    </div>
                <div class="card-body p-0">
                    
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <tr>
                                <th>STT</th>
                                <th>Loại Tin</th>
                                <th>Action</th>
                            </tr>
                            <?php $i=1; ?>
                            @foreach($loaitin as $value)
                                <tr>
                                    <td>{{$i}}</td>
                                    <td>{{$value->Tenloaitin}}</td>
                                    <td><a href="#" class="btn btn-action btn-secondary">Detail</a></td>
                                </tr>
                            <?php $i++;?>
                            @endforeach
                        </table>
                    {{ $loaitin->links() }}
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Them loaitin -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Thêm loại tin tức</h4>
      </div>
      <form method="POST" class="form-control" action="/admin/themLoai">
      <div class="modal-body">                                 
            <input type="text" name="Tenloaitin" class="form-control" placeholder="Nhập ten loai tin VD: Tin tuc nha dat" required>                                     
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
 @endsection

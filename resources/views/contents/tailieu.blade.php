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
                    <h4>Tai lieu</h4>
                </div>
                <div class="input-append">
                    <input id="fieldID4" type="text" value="">
                    <a data-toggle="modal" data-toggle="modal" data-target="#myModal" class="btn" type="button">Select</a>
                  </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                    <table class="table table-striped">
                            <tr>
                                <th>STT</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Quyen</th>
                                <th>Trang thai</th>
                                <th>Action</th>
                            </tr>
                        <?php $i=1;$status=""?>
                        
                    </table>
                   
                    </div>
                </div>
               
                </div>
            </div>
        </div>
    </div>
</section>
<div class="modal fade" id="myModal">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <h4 class="modal-title"Thư viện quản lts file</h4>
        </div>
        <div class="modal-body">
          <iframe width="100%" height="450" src="../filemanager/dialog.php?type=2&amp;field_id=fieldID4'&amp;fldr=" ></iframe>
        </div>
      </div>
    </div>
    </div>
 @endsection

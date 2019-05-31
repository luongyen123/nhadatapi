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
                    <h4>Full Width</h4>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                    <table class="table table-striped">
                        <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Created At</th>
                        <th>Status</th>
                        <th>Action</th>
                        </tr>
                        <tr>
                        <td>1</td>
                        <td>Irwansyah Saputra</td>
                        <td>2017-01-09</td>
                        <td><div class="badge badge-success">Active</div></td>
                        <td><a href="#" class="btn btn-action btn-secondary">Detail</a></td>
                        </tr>
                        <tr>
                        <td>2</td>
                        <td>Hasan Basri</td>
                        <td>2017-01-09</td>
                        <td><div class="badge badge-success">Active</div></td>
                        <td><a href="#" class="btn btn-action btn-secondary">Detail</a></td>
                        </tr>
                        <tr>
                        <td>3</td>
                        <td>Kusnadi</td>
                        <td>2017-01-11</td>
                        <td><div class="badge badge-danger">Not Active</div></td>
                        <td><a href="#" class="btn btn-action btn-secondary">Detail</a></td>
                        </tr>
                        <tr>
                        <td>4</td>
                        <td>Rizal Fakhri</td>
                        <td>2017-01-11</td>
                        <td><div class="badge badge-success">Active</div></td>
                        <td><a href="#" class="btn btn-action btn-secondary">Detail</a></td>
                        </tr>
                    </table>
                    </div>
                </div>
                <div class="card-footer text-right">
                    <nav class="d-inline-block">
                    <ul class="pagination mb-0">
                        <li class="page-item disabled">
                        <a class="page-link" href="#" tabindex="-1"><i class="ion ion-chevron-left"></i></a>
                        </li>
                        <li class="page-item active"><a class="page-link" href="#">1 <span class="sr-only">(current)</span></a></li>
                        <li class="page-item">
                        <a class="page-link" href="#">2</a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                        <a class="page-link" href="#"><i class="ion ion-chevron-right"></i></a>
                        </li>
                    </ul>
                    </nav>
                </div>
                </div>
            </div>
        </div>
    </div>
</section>
 @endsection

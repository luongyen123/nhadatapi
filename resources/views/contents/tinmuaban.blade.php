@extends('layouts.layout')
@section('title')
{{$title}}
@endsection
@section('css')
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
@endsection
@section('content')
<section class="section">
    <h1 class="section-header">
        <div>{{$title}}
           
        </div>
    </h1>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-12 col-sm-12">
            <div class="card">
            <div class="card-header">
                <h4>Danh sách bài viết</h4>
            </div>
            <div class="card-body">
            <label>Tin mua bán nhà đất</label>
                <table class="table table-striped" id="">
                    <thead>
                        <tr>
                            <th>Tiêu đề</th>
                            <th>Giá</th>
                            <th>Diện tích</th>
                            <th>Vị trí</th>
                            <th>Người đăng</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($tinmuaban as $tinban)                     
                        <tr>
                            <td>
                                {{$tinban->tieude}}
                            </td>
                            <td>
                                {{$tinban->gia}} {{$tinban->tiente}}
                            </td>
                            <td>
                                {{$tinban->dientich}} {{$tinban->dvdt}}
                            </td>
                            <td> {{$tinban->vitri}}</td>
                            <td>{{$tinban->user->name}}</td>
                            <td>
                                <a class="btn btn-primary btn-action mr-1" data-toggle="tooltip" title="Edit" href="/admin/editTinmua/{{$tinban->id}}"><i class="ion ion-edit"></i></a>
                                <a class="btn btn-danger btn-action" data-toggle="tooltip" title="Delete"><i class="ion ion-trash-b"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                 {{ $tinmuaban->links() }}
                
            </div>
            </div>
        </div>
    </div>
 </section>
@endsection
@section('js')
 @endsection

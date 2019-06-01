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
                <table class="table table-striped" id="">
                    <thead>
                        <tr>
                            <th>Tiêu đề</th>
                            <th>Người đăng</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>

                    <tbody>
                    @if(count($tintucs) >0)
                        @foreach($tintucs as $tintuc)                     
                        <tr>
                            <td>
                                {{$tintuc->tieude}}
                            </td>
                            <td>{{$tintuc->user->name}}</td>
                            <td>
                                <a class="btn btn-primary btn-action mr-1" data-toggle="tooltip" title="Edit" href="/admin/editTintuc/{{$tintuc->id}}"><i class="ion ion-edit"></i></a>
                                <a class="btn btn-danger btn-action" data-toggle="tooltip" title="Delete" href=""><i class="ion ion-trash-b"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="3" class="text-center"> Chưa có bài viết</td>
                        </tr>
                    @endif
                    </tbody>
                </table>
                 {{ $tintucs->links() }}
                
            </div>
            </div>
        </div>
    </div>
 </section>
@endsection
@section('js')
 @endsection

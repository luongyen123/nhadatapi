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
                    <h4>Danh sach tai khoan</h4>
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
                        @foreach($users as $user)
                            <tr>
                                <td>{{$i}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>
                                    @if($user->role ==0)
                                        {{"Quan tri vien"}}
                                    @else
                                        {{"Bien tap vien"}}
                                    @endif
                                </td>
                                <td><a href = "/admin/active/{{$user->id}}" class=" btn-action badge @if($user->status == 0){{'badge-success'}} <?php $status='Active'?> @else {{'badge-danger'}} <?php $status='Not Ative' ?> @endif">{{$status}}</a></td>
                                <td>
                                    <a class="btn btn-primary btn-action mr-1"  title="Edit" href="/admin/userEdit/{{$user->id}}"><i class="ion ion-edit"></i></a>
                                    <a class="btn btn-danger btn-action"  title="Delete" href="/admin/delete/{{$user->id}}" onclick="return confirm('Ban chac chan muon xoa?');"><i class="ion ion-trash-b"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                    {{ $users->links() }}
                    </div>
                </div>
               
                </div>
            </div>
        </div>
    </div>
</section>
 @endsection

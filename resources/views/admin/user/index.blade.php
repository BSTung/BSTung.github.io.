@extends('layouts.app_master_admin')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Quản lý thành viên</h1>
        <!-- <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{ route('admin.user.index')}}"> User</a></li>
            <li class="active"> List</a></li>
        </ol> -->
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                    <div class="col-md-12">
                        <table class="table">
                                    <tr>
                                        <th style="width: 10px">STT</th>
                                        <th>Tên người dùng</th>
                                        <th>Email</th>
                                        <th>Số điện thoại</th>
                                        <th>Thời gian</th>
                                        <th>Chỉnh sửa</th>
                                    </tr>
                                    @if (isset($users))
                                        <?php $count = 0; ?>
                                        @foreach ($users as $user)
                                        <?php $count++; ?>
                                            <tr>
                                                <td>{{ $count}}</td>
                                                <td>{{ $user->name}}</td>
                                                <td>{{ $user->email}}</td>
                                                <td>{{ $user->phone}}</td>
                                                <td>{{ $user->created_at}}</td>
                                                <td>
                                                    <!-- <a href="{{ route('admin.user.update', $user->id)}}" class="btn btn-xs btn-success"><i class="fa fa-pencil"></i> Edit</a> -->
                                                    <a href="{{ route('admin.user.delete', $user->id)}}" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i> Xóa</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                        </table>
                </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    {!! $users->links() !!}
                </div>
                <!-- /.box-footer-->
            </div>
            <!-- /.box -->
    </section>
    <!-- /.content -->
@stop
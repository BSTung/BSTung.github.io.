@extends('layouts.app_master_admin')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Quản lý các Page tĩnh</h1>
        <!-- <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{  route('admin.static.index') }}"> Static</a></li>
            <li class="active"> List</a></li>
        </ol> -->
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <div class="box-header">
                    <h3 class="box-title"><a href="{{ route('admin.static.create') }}" class="btn btn-primary">Thêm mới <i class="fa fa-plus"></i></a></h3>
               </div>
                <div class="box-body">
                   <div class="col-md-12">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <th style="width: 10px">STT</th>
                                    <th>Tên page</th>
                                    <th>Kiểu</th>
                                    <th>Thời gian</th>
                                    <th>Chỉnh sửa</th>
                                </tr>
                                @if (isset($statics))
                                <?php $count = 0; ?>
                                    @foreach($statics as $static)
                                    <?php $count++; ?>
                                        <tr>
                                            <td>{{ $count }}</td>
                                            <td>{{ $static->s_title }}</td>
                                            <td>{{ $static->getType($static->s_type) }}</td>
                                            <td>{{  $static->created_at }}</td>
                                            <td>
                                                <a href="{{ route('admin.static.update', $static->id) }}" class="btn btn-xs btn-primary"><i class="fa fa-pencil"></i> Cập nhật</a>
                                                <a href="{{  route('admin.static.delete', $static->id) }}" class="btn btn-xs btn-danger js-delete-confirm"><i class="fa fa-trash"></i> Xóa</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    {{-- {!! $slides->links() !!} --}}
                </div>
                <!-- /.box-footer-->
            </div>
            <!-- /.box -->
    </section>
    <!-- /.content -->
@stop
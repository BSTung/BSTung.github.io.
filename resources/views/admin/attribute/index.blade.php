@extends('layouts.app_master_admin')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Quản lý thuộc tính</h1>
        <!-- <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{ route('admin.attribute.index')}}"> Thuộc tính</a></li>
            <li class="active"> List</a></li>
        </ol> -->
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <div class="box-header">
                    <h3 class="box-title"><a href="{{ route('admin.attribute.create')}}"  class="class btn btn-success">Thêm Mới <i class="fa fa-plus"></i></a></h3>
                </div>
                    <div class="col-md-12">
                        <table class="table">
                                    <tr>
                                        <th style="width: 10px">STT</th>
                                        <th>Tên</th>
                                        <th>Kiểu</th>
                                        <th>Danh mục</th>
                                        <th>Thời gian</th>
                                        <th>Chỉnh sửa</th>
                                    </tr>
                                    @if (isset($attributes))
                                        <?php $count = 0; ?>
                                        @foreach ($attributes as $attribute)
                                        <?php $count++; ?>
                                            <tr>
                                                <td>{{ $count}}</td>
                                                <td>{{ $attribute->atb_name}}</td>
                                                <td>
                                                    <span class="{{ $attribute->getType($attribute->atb_type) ['class']}}">
                                                        {{ $attribute->getType($attribute->atb_type)['name']}}
                                                    </span>
                                                </td>
                                                <td>
                                                    <span class="label label-info">{{ $attribute->category->c_name ?? "[N\A]"}}</span>
                                                </td>
                                                <td>{{ $attribute->created_at}}</td>
                                                <td>
                                                    <a href="{{ route('admin.attribute.update', $attribute->id)}}" class="btn btn-xs btn-success"><i class="fa fa-pencil"></i> Cập nhật</a>
                                                    <a href="{{ route('admin.attribute.delete', $attribute->id)}}" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i> Xóa</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                        </table>
                </div>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
    </section>
    <!-- /.content -->
@stop
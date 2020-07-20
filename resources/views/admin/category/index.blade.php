@extends('layouts.app_master_admin')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Quản lý danh mục sản phẩm</h1>
        <!-- <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{ route('admin.category.index')}}"> Category</a></li>
            <li class="active"> List</a></li>
        </ol> -->
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <div class="box-header">
                    <h3 class="box-title"><a href="{{ route('admin.category.create')}}"  class="class btn btn-success">Thêm Mới <i class="fa fa-plus"></i></a></h3>
                </div>
                    <div class="col-md-12">
                        <table class="table">
                                    <tr>
                                        <th style="width: 10px">STT</th>
                                        <th>Tên danh mục</th>
                                        <th>Ảnh danh mục</th>
                                        <th>Trạng thái</th>
                                        <th>Hot</th>
                                        <th>Thời gian</th>
                                        <th>Chỉnh sửa</th>
                                    </tr>
                                    @if ($categories)
                                        <?php $count = 0; ?>
                                        @foreach ($categories as $category)
                                            <?php $count++; ?>
                                            <tr>
                                                <td>{{ $count }}</td>
                                                <td>{{ $category->c_name}}</td>
                                                <td>
                                                    <img src="{{ pare_url_file($category->c_avatar) }}" style="width: 80px; height: 80px;">
                                                </td>
                                                <td>
                                                      @if ($category->c_status == 1)
                                                         <a href="{{ route('admin.category.active', $category->id)}}"class="label label-info">Show</a>
                                                     @else
                                                         <a href="{{ route('admin.category.active', $category->id)}}"class="label label-default">Hide</a>
                                                      @endif
                                                </td>
                                                <td>
                                                     @if ($category->c_hot == 1)
                                                         <a href="{{ route('admin.category.hot', $category->id)}}"class="label label-info">Hot</a>
                                                     @else
                                                         <a href="{{ route('admin.category.hot', $category->id)}}"class="label label-default">Non</a>
                                                      @endif
                                                </td>
                                                <td>{{ $category->created_at}}</td>
                                                <td>
                                                    <a href="{{ route('admin.category.update', $category->id)}}" class="btn btn-xs btn-success"><i class="fa fa-pencil"></i> Cập nhật</a>
                                                    <a href="{{ route('admin.category.delete', $category->id)}}" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i> Xóa</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                        </table>
                </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    {!! $categories->links() !!}
                </div>
                <!-- /.box-footer-->
            </div>
            <!-- /.box -->
    </section>
    <!-- /.content -->
@stop
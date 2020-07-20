@extends('layouts.app_master_admin')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Quản lý Slide</h1>
        <!-- <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{ route('admin.slide.index')}}"> Slide</a></li>
            <li class="active"> List</a></li>
        </ol> -->
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <div class="box-header">
                    <h3 class="box-title"><a href="{{ route('admin.slide.create')}}"  class="class btn btn-success">Thêm Mới <i class="fa fa-plus"></i></a></h3>
                </div>
                    <div class="col-md-12">
                        <table class="table">
                                    <tr>
                                        <th style="width: 10px">STT</th>
                                        <th>Tên Slide</th>
                                        <th>Trạng thái</th>
                                        <th>Thứ tự hiển thị</th>
                                        <!-- <th>Mục tiêu</th> -->
                                        <th>Thời gian</th>
                                        <th>Chỉnh sửa</th>
                                    </tr>
                                    @if (isset($slides))
                                    <?php $count = 0; ?>
                                        @foreach ($slides as $slide)
                                        <?php $count++; ?>
                                            <tr>
                                                <td>{{ $count}}</td>
                                                <td>{{ $slide->sd_title}}</td>
                                                <td>
                                                      @if ($slide->sd_active == 1)
                                                         <a href="{{ route('admin.slide.active', $slide->id)}}"class="label label-info">Show</a>
                                                     @else
                                                         <a href="{{ route('admin.slide.active', $slide->id)}}"class="label label-default">Hide</a>
                                                      @endif
                                                </td>
                                                <td>{{ $slide->sd_sort}}</td>
                                                <!-- <td>{{ $slide->sd_target}}</td> -->
                                                <td>{{ $slide->created_at}}</td>
                                                <td>
                                                    <a href="{{ route('admin.slide.update', $slide->id)}}" class="btn btn-xs btn-success"><i class="fa fa-pencil"></i> Cập nhật</a>
                                                    <a href="{{ route('admin.slide.delete', $slide->id)}}" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i> Xóa</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                        </table>
                </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    
                </div>
                <!-- /.box-footer-->
            </div>
            <!-- /.box -->
    </section>
    <!-- /.content -->
@stop
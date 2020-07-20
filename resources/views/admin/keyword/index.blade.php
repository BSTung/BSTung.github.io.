@extends('layouts.app_master_admin')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Quản lý từ khóa</h1>
        <!-- <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{ route('admin.keyword.index')}}"> Keyword</a></li>
            <li class="active"> List</a></li>
        </ol> -->
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <div class="box-header">
                    <h3 class="box-title"><a href="{{ route('admin.keyword.create')}}"  class="class btn btn-success">Thêm Mới <i class="fa fa-plus"></i></a></h3>
                </div>
                    <div class="col-md-12">
                        <table class="table">
                                    <tr>
                                        <th style="width: 10px">STT</th>
                                        <th>Tên từ khóa</th>
                                        <th>Miêu tả</th>
                                        <th>Hot</th>
                                        <th>Thời gian</th>
                                        <th>Chỉnh sửa</th>
                                    </tr>
                                    @if (isset($keywords))
                                        <?php $count = 0; ?>
                                        @foreach ($keywords as $keyword)
                                        <?php $count++; ?>
                                            <tr>
                                                <td>{{ $count}}</td>
                                                <td>{{ $keyword->k_name}}</td>
                                                <td>{{ $keyword->k_description}}</td>
                                                <td>
                                                     @if ($keyword->k_hot == 1)
                                                         <a href="{{ route('admin.keyword.hot', $keyword->id)}}"class="label label-info">Hot</a>
                                                     @else
                                                         <a href="{{ route('admin.keyword.hot', $keyword->id)}}"class="label label-default">Non</a>
                                                      @endif
                                                </td>
                                                <td>{{ $keyword->created_at}}</td>
                                                <td>
                                                    <a href="{{ route('admin.keyword.update', $keyword->id)}}" class="btn btn-xs btn-success"><i class="fa fa-pencil"></i> Cập nhật</a>
                                                    <a href="{{ route('admin.keyword.delete', $keyword->id)}}" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i> Xóa</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                        </table>
                </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    {!! $keywords->links() !!}
                </div>
                <!-- /.box-footer-->
            </div>
            <!-- /.box -->
    </section>
    <!-- /.content -->
@stop
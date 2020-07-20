@extends('layouts.app_master_admin')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Quản lý bài viết</h1>
<!--         <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{ route('admin.article.index')}}"> Article</a></li>
            <li class="active"> List</a></li>
        </ol> -->
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <div class="box-header">
                    <h3 class="box-title"><a href="{{ route('admin.article.create')}}"  class="class btn btn-success">Thêm Mới <i class="fa fa-plus"></i></a></h3>
                </div>
                    <div class="col-md-12">
                        <table class="table">
                            <tbody>
                                    <tr>
                                        <th style="width: 10px">STT</th>
                                        <th>Tên bài viết</th>
                                        <th>Danh mục</th>
                                        <th>Hình ảnh</th>
                                        <th>Hot</th>
                                        <th>Trạng thái</th>
                                        <th>Chỉnh sửa</th>
                                    </tr>
                            </tbody>    
                                 @if (isset($articles))
                                 <?php $count = 0; ?>
                                        @foreach ($articles as $article)
                                        <?php $count++; ?>
                                            <tr>
                                                <td>{{ $count}}</td>
                                                <td>{{ $article->a_name}}</td>
                                                <td>
                                                    <span class="label label-success">{{ $article->menu->mn_name ?? "[N\A]"}}</span>
                                                </td>
                                                <td>
                                                    <img src="{{ pare_url_file($article->a_avatar) }}" style="width: 80px; height: 80px">

                                                </td>
                                                <td>
                                                     @if ($article->a_hot == 1)
                                                         <a href="{{ route('admin.article.hot', $article->id)}}"class="label label-info">Hot</a>
                                                     @else
                                                         <a href="{{ route('admin.article.hot', $article->id)}}"class="label label-default">Non</a>
                                                      @endif
                                                </td>
                                                 <td>
                                                     @if ($article->a_active == 1)
                                                         <a href="{{ route('admin.article.active', $article->id)}}"class="label label-info">Active</a>
                                                     @else
                                                         <a href="{{ route('admin.article.active', $article->id)}}"class="label label-default">Hide</a>
                                                      @endif
                                                </td>
                                                <td>{{ $article->created_at}}</td>
                                                <td>
                                                    <a href="{{ route('admin.article.update', $article->id)}}" class="btn btn-xs btn-success"><i class="fa fa-pencil"></i> Cập nhật</a>
                                                    <a href="{{ route('admin.article.delete', $article->id)}}" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i> Xóa</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                        </table>
                </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    {!! $articles->links() !!}
                
                </div>
                <!-- /.box-footer-->
            </div>
            <!-- /.box -->
    </section>
    <!-- /.content -->
@stop
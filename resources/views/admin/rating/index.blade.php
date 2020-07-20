@extends('layouts.app_master_admin')
@section('content')
<style type="text/css">
    .ratings span i {
        color: #eff0f5;
    }
    .ratings span.active i {
        color: #faca51;

    }
</style>
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Danh sách đánh giá sản phẩm</h1>
        <!-- <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{ route('admin.rating.index')}}"> Rating</a></li>
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
                                        <th>Tên sản phẩm</th>
                                        <th>Người đánh giá</th>
                                        <th>Đánh giá</th>
                                        <th>Nội dung</th>
                                        <th>Thời gian</th>
                                        <th>Chỉnh sửa</th>
                                    </tr>
                                    @if (isset($ratings))
                                        <?php $count = 0; ?>
                                        @foreach($ratings as $rating)
                                        <?php $count++; ?>
                                            <tr>
                                                <td>{{ $count}}</td>
                                                <td>{{ $rating->product->pro_name ?? "[N\A]"}}</td>
                                                <td>{{ $rating->user->name ?? "[N\A]"}}</td>
                                                <td>
                                                    <div class="ratings">
                                                        @for($i = 1; $i <= 5; $i ++)
                                                        <span class="{{ $i <= $rating->r_number ? 'active' : '' }}"><i class="fa fa-star"></i></span>
                                                    @endfor
                                                    </div>
                                                </td>
                                                <td>{{ $rating->r_content}}</td>
                                                <td>{{ $rating->created_at}}</td>
                                                <td>

                                                    <a href="{{ route('admin.rating.delete', $rating->id)}}" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i> Xóa</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                        </table>
                </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    {!! $ratings->links() !!}
                </div>
                <!-- /.box-footer-->
            </div>
            <!-- /.box -->
    </section>
    <!-- /.content -->
@stop
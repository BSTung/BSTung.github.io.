@extends('layouts.app_master_admin')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Quản lý đơn hàng</h1>
        <!-- <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{ route('admin.transaction.index')}}"> Transaction</a></li>
            <li class="active"> List</a></li>
        </ol> -->
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <div class="box-title">
                    <form class="form-inline">
                        <!-- <input type="text" class="form-control" value="{{ Request::get('id')}}" name="id" placeholder="ID"> -->
                        <input type="text" class="form-control" value="{{ Request::get('email')}}" name="email" placeholder="Email...">
                        <select name="type" class="form-control">
                            <option value="0">Phân loại khách</option>
                            <option value="1" {{ Request::get('type') == 1 ? "selected='selected'" : ""}}>Thành viên</option>
                            <option value="2" {{ Request::get('type') == 2 ? "selected='selected'" : ""}}>Khách</option>
                        </select>
                        <select name="status" class="form-control">
                            <option value="">Trạng thái</option>
                            <option value="1" {{ Request::get('status' == 1 ? "selected='selected'" : "")}}>Tiếp nhận</option>
                            <option value="2" {{ Request::get('status' == 2 ? "selected='selected'" : "")}}>Đang vận chuyển</option>
                            <option value="3" {{ Request::get('status' == 3 ? "selected='selected'" : "")}}>Đã bàn giao</option>
                            <option value="-1" {{ Request::get('status' == -1 ? "selected='selected'" : "")}}>Hủy bỏ</option>
                        </select>
                        <button type="submit" class="btn btn-success"><i class="fa fa-search"> Tìm kiếm</i></button>
                        <button type="submit" name="export" value="true" class="btn btn-info">
                            <i class="fa fa-save"> Xuất Excel</i></button>
                    </form>
                </div>
                    <div class="col-md-12">
                        <table class="table">
                                    <tr>
                                        <th style="width: 10px">STT</th>
                                        <th>Thông tin đơn hàng</th>
                                        <th>Giá đơn hàng</th>
                                        <th>Tài khoản</th>
                                        <th>Trạng thái</th>
                                        <th>Thời gian</th>
                                        <th>Ghi chú</th>
                                        <th>Chỉnh sửa</th>
                                    </tr>
                                    @if (isset($transactions))
                                    <?php $count = 0; ?>
                                        @foreach ($transactions as $transaction)
                                        <?php $count++; ?>
                                            <tr>
                                                <td>{{ $count}}</td>
                                                <td>
                                                    <ul>
                                                        <li>Name: {{ $transaction->tst_name}}</li>
                                                        <li>Email: {{ $transaction->tst_email}}</li>
                                                        <li>Phone: {{ $transaction->tst_phone}}</li>
                                                        <li>Address: {{ $transaction->tst_address}}</li>
                                                    </ul>
                                                </td>
                                                <td>{{ number_format($transaction->tst_total_money,0,',','.')}} đ</td>
                                                <td>
                                                    @if ($transaction->tst_user_id)
                                                        <span class="label label-success">Thành Viên</span>
                                                    @else
                                                        <span class="label label-default">Khách Hàng</span>
                                                    @endif

                                                </td>
                                                <td>
                                                    <span class="label label-{{ $transaction->getStatus($transaction->tst_status)['class']}}">
                                                    {{ $transaction->getStatus($transaction->tst_status)['name']}}
                                                    </span>
                                                </td>
                                                <td>{{ $transaction->created_at}}</td>
                                                <td>{{ $transaction->tst_note}}</td>
                                            <td>
                                                <a data-id="{{$transaction->id}}" href="{{ route('ajax.admin.transaction.detail', $transaction->id)}}" class="btn btn-xs btn-info js-preview-transaction"><i class="fa fa-eye"></i> Xem</a>

                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-success btn-xs">Trạng thái</button>
                                                    <button type="button" class="btn btn-success btn-xs dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                        <span class="caret"></span>
                                                        <span class="sr-only">Toggle Dropdown</span>
                                                    </button>
                                                    <ul class="dropdown-menu" role="menu">
                                                        <li>
                                                            <a href="{{ route('admin.transaction.delete', $transaction->id)}}" class=""><i class="fa fa-trash"></i> Xóa</a>
                                                        </li>
                                                        <li>
                                                            <a href="{{ route('admin.action.transaction',['process', $transaction->id])}}"><i class="fa fa-ban"></i> Đang bàn giao</a>
                                                        </li>
                                                        <li>
                                                            <a href="{{ route('admin.action.transaction',['success', $transaction->id])}}"><i class="fa fa-ban"></i> Đã bàn giao</a>
                                                        </li>
                                                        <li>
                                                            <a href="{{ route('admin.action.transaction',['cancel', $transaction->id])}}"><i class="fa fa-ban"></i> Hủy</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </td>
                                                </tr>
                                        @endforeach
                                    @endif
                        </table>
                </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    {!! $transactions->appends($query)->links() !!}
                </div>
                <!-- /.box-footer-->
            </div>
            <!-- /.box -->
    </section>

    <div class="modal fade fade" id="modal-preview-transaction">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Chi tiết đơn hàng <b id="idTransaction">#1</b></h4>
            </div>
            <div class="modal-body">
            <div class="content">
                    <!-- <table class="table table-condensed">
                    <tbody>
                        <tr>
                            <th style="width: 10px">#</th>
                            <th>Name</th>
                            <th>Avatar</th>
                            <th>Price</th>
                            <th>Qty</th>
                            <th>Total</th>
                            <th>Action</th>
                        </tr>
                        <tr>
                            <td>#1.</td>
                            <td>Sản phẩm 1</td>
                            <td>
                                <img src="" alt="">
                            </td>
                            <td>2.000.000 đ</td>
                            <td>2</td>
                            <td>4.000.000 đ</td>
                            <td>
                                <a href="" class="btn btn-xs btn-danger">Delete</a>
                            </td>
                        </tr>
                    </tbody>
                </table> -->
            </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Đóng</button>
                <button type="button" class="btn btn-primary">Lưu thay đổi</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
    <!-- /.content -->
@stop
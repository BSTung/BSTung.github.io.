@extends('layouts.app_master_user')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/user.min.css') }}">
@stop
@section('content')
    <section>
        <div class="title">Theo dõi đơn hàng #{{ $transaction->id }}</div>
        <div class="content">
            <h4>Trạng thái đơn hàng</h4>
            <div class="progress">
                <p>Trạng thái <b>{{ $transaction->getStatus($transaction->tst_status)['name'] }}</b></p>
                <?php 
                    $progress = array(
                        '-1' => 'Đặt hàng thành công', 
                        '1'  => 'Đã tiếp nhận',
                        '2'  => 'Bàn giao vận chuyển',
                        '3'  => 'Thành công',
                    );
                ?>
                <div class="progress-bar">
                    @foreach($progress as $key => $item)
                        <div class="progress-item {{ (int)$key < $transaction->tst_status ? 'active' : '' }}">
                            <span>{{ $item }}</span>
                        </div>
                    @endforeach
                </div>
            </div>
            <h4>Đơn hàng gồm có</h4>
            @include('user.include._inc_list_product_order')
            <div>
                <a href="{{ route('get.user.transaction') }}" class="btn btn-primary js-"><i class="la la-angle-double-left"></i> Quay lại đơn hàng</a>
            </div>
        </div>
    </section>
@stop

@extends('layouts.app_master_user')
@section('css')
    <style>
        <?php $style = file_get_contents('css/user.min.css');echo $style;?>
    </style>
@stop
@section('content')
    <section>
        <div class="title">Danh sách sản phẩm yêu thích</div>
        <div class="row mb-5">
           <div class="col-sm-12">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <!-- <th scope="col">Mã SP</th> -->
                            <th style="width: 10px">STT</th>
                            <th class="w-25" scope="col">Sản phẩm</th>
                            <th scope="col">Danh mục</th>
                            <th scope="col">Ảnh</th>
                            <th scope="col">Giá</th>
                            <th scope="col">Cập nhật</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $count = 0; ?>
                        @foreach($products as $item )
                            <?php $count++; ?>
                            <tr>
                                <!-- <th scope="row">SP{{ $item->id }}</th> -->
                                <td>{{ $count}}</td>
                                <th>{{ $item->pro_name }}</th>
                                <th>
                                    <span class="label label-success">{{ $item->category->c_name ?? "[N\A]" }}</span>
                                </th>
                                <th>
                                    <img src="{{ pare_url_file($item->pro_avatar) }}" style="width: 80px;height: 100px">
                                </th>
                                <th>{{ number_format($item->pro_price,0,',','.') }} đ</th>
                                <th>
                                    <a style="background-color: red" class="btn btn-warning"  href="{{  route('get.user.favourite.delete', $item->id) }}">Huỷ bỏ</a>
                                </th>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
           </div>
        </div>
    </section>
@stop

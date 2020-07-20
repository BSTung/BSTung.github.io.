@extends('layouts.app_master_user')
@section('css')
    <style>
        <?php $style = file_get_contents('css/user.min.css');echo $style;?>
    </style>
@stop
@section('content')
    <section class="py-lg-5" style="background: white; padding: 20px">
        <!-- <h2>Cập nhật thông tin</h2> -->
        <div class="row mb-5">
            <div class="col-sm-12">
                <form action="" method="POST">
                @csrf
            <div class="form-group">
                <label for="">Tên người dùng</label>
                <input type="text" name="name" class="form-control" value="{{ Auth::user()->name }}" placeholder="">
                <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Email</label>
                <input type="email" class="form-control" name="email" value="{{ Auth::user()->email }}" placeholder="Enter email">
                <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
            </div>
            <div class="form-group">
                <label for="">Số điện thoại</label>
                <input type="number" name="phone" class="form-control" value="{{ Auth::user()->phone }}" placeholder="">
                <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
            </div>
            <div class="form-group">
                <label for="">Địa chỉ</label>
                <input type="text" name="address" class="form-control" value="{{ Auth::user()->address }}" placeholder="Địa chỉ">
                <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
            </div>

            <!-- <div class="from-group">
                <div class="upload-btn-wrapper">
                    <button class="btn-upload">Cập nhật ảnh</button>
                    <input type="file" name="avatar" value="" />
                </div>
            </div> -->
            
            <button type="submit" class="btn btn-primary">Cập nhật</button>
            </form>
            </div>
         </div>
    </section>
@stop
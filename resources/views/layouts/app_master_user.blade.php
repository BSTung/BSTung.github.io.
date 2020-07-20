<!DOCTYPE html>
<html lang="vi">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
    <title>{{ strtolower($title_page ?? "Đồ án tốt nghiệp")   }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" sizes="32x32" type="image/png" href="{{ asset('ico.png') }}" />
    @yield('css')

    {{-- Thông báo --}}
    @if(session('toastr'))
        <script>
            var TYPE_MESSAGE = "{{session('toastr.type')}}";
            var MESSAGE = "{{session('toastr.message')}}";
        </script>
    @endif
</head>
<body>
@include('frontend.components.header')
<div class="container user">
    <div class="left">
        <div class="header">
            <img src="{{ url('images/logoGym.png') }}" alt="">
            <p>
                <span><a href="">{{ Auth::user()->name }}</a></span>
                <span></span>
            </p>
        </div>
        <!-- <p>Đăng nhập lần cuối: <b>{{ get_time_login(Auth::user()->log_login)['time'] ?? "" }}</b></p> -->
        
        <div class="content">
            <ul class="left-nav">
               
               {{--
                @foreach(config('user') as $item)
                    <li>
                        <a href="{{ route($item['route']) }}" class="{{ \Request::route()->getName() == $item['route'] ? 'active' : '' }}">
                            <i class="{{ $item['icon'] }}"></i>
                            <span>{{ $item['name'] }}</span>
                        </a>
                    </li>
                @endforeach
                --}}


            </ul>
        </div>



        <div class="collapse navbar-collapse flex-column" id="navbar-collapse">
                    <ul class="navbar-nav d-lg-block">
                        <li class="nav-item">
                            <a class="nav-link" href="{{  route('get.user.update_info') }}">Cập nhật thông tin</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('get.user.transaction') }}">Quản lý đơn hàng</a>
                        </li>
                        
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('get.user.favourite') }}">Sản phẩm yêu thích</a>
                        </li>
                    </ul>
                </div>



    </div>
    <div class="right">
        @yield('content')
    </div>
    <div class="" style="clear: both"></div>
</div>
@include('frontend.components.footer')
<script>
    var DEVICE = '{{  device_agent() }}'
</script>
<script src="{{ asset('js/cart.js') }}" type="text/javascript"></script>

@yield('script')
</body>
</html>

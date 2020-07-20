<link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">

<style>
    .navi ul {
      list-style-type: none;
      margin: 0;
      padding: 0;
      overflow: hidden;
      background-color: #26E4D6;
    }

    .navi li {
      float: left;
    }

    .navi li a {
      display: block;
      color: white;
      text-align: center;
      padding: 14px 16px;
      text-decoration: none;
    }

    .navi li a:hover:not(.active) {
      background-color: #111;
    }

    .navi .active {
      background-color: #266EE4;
    }
</style>

<section class="top-header desktop">
    <div class="container">
        <div class="content">
            <div class="left">
                <a href="{{ route('get.static.customer_care') }}" title="Chăm sóc khách hàng" rel="nofollow">Chăm sóc khách hàng</a>
                 <a href="{{ route('get.user.transaction') }}" title="Kiểm tra đơn hàng" rel="nofollow">Kiểm tra đơn hàng</a>
            </div>
            <div class="right">
                @if (Auth::check())
                    <a href="">Xin chào {{ Auth::user()->name }}</a>
                    <a href="{{  route('get.user.dashboard') }}">Quản lý tài khoản</a>
                    <a href="{{  route('get.logout') }}">Đăng xuất </a>
                @else
                    <a href="{{  route('get.register') }}">Đăng ký</a>
                    <a href="{{  route('get.login') }}">Đăng nhập</a>
                @endif
             </div>
        </div>
    </div>
</section>
<section class="top-header mobile">
    <div class="container">
        <div class="content">
            <div class="left">
                <a href="{{ route('get.static.customer_care') }}" title="Chăm sóc khách hàng" rel="nofollow">Chăm sóc khách hàng</a>
                <a href="{{ route('get.user.transaction') }}" title="Kiểm tra đơn hàng" rel="nofollow">Kiểm tra đơn hàng</a>
                @if (Auth::check())
                    <a href="">Xin chào {{ Auth::user()->name }}</a>
                    <a href="{{  route('get.user.dashboard') }}">Quản lý tài khoản</a>
                    <a href="{{  route('get.logout') }}">Đăng xuất </a>
                @else
                    <a href="{{  route('get.register') }}">Đăng ký</a>
                    <a href="{{  route('get.login') }}">Đăng nhập</a>
                @endif
            </div>
        </div>
    </div>
</section>

<div class="commonTop">
    <div id="headers">
        <div class="container header-wrapper">
            <!--Thay đổi-->
            <div class="logo">
                <a href="http://localhost:8080/frameLaravel/thehinh.vn/public/" class="desktop">
                    <img src="{{ url('images/logo1.jpg') }}" style="height: 35px;" alt="Home">
                </a>
         <a href="http://localhost:8080/frameLaravel/thehinh.vn/public/" class="mobile">
             <img src="{{ url('images/logo2.jpg') }}" alt="Home">
         </a>
            <li>
                    <span class="menu js-menu-cate"><i class="la la-list-ul"></i> </span>
                </li>
            </div>
            <div>
              
            </div>
            <div class="search">

                <form action="{{ $link_search ?? route('get.product.list',['k' => Request::get('k')]) }}" role="search" method="GET">
                    <input type="text" name="k" value="{{ Request::get('k') }}" class="form-control" placeholder="Tìm kiếm sản phẩm ...">
                    <button type="submit" class="btnSearch">
                        <i class="la la-search"></i>
                        <span>Tìm kiếm</span>
                    </button>
                </form>
            </div>
            <ul class="right">
                <li>
                    <a href="{{ route('get.shopping.list') }}" title="Giỏ hàng">
                        <i class="la la-shopping-cart"></i>
                        <span class="text">
                            <span class="">Giỏ hàng ({{ \Cart::count() }})</span>
                            <span></span>
                        </span>
                    </a>
                </li>
                <li class="desktop">
                    <a href="tel:18006005" title="">
                        <i class="la la-phone"></i>
                        <span class="text">
                            <span class="">Hotline</span>
                            <span>0337857855</span>
                        </span>
                    </a>
                </li>
            
            </ul>

            

             <div id="menu-main" class="container" style="display: none;">
                <ul class="menu-list">
                    @foreach($categories as $item)
                    <li>
                        <a href="{{  route('get.category.list', $item->c_slug.'-'.$item->id) }}"
                           title="{{  $item->c_name }}" class="js-open-menu">
                            <img src="{{ pare_url_file($item->c_avatar) }}" alt="{{ $item->c_name }}">
                            <span>{{  $item->c_name }}</span>
                            @if (isset($item->children) && count($item->children))
                                <span class="fa fa-angle-right"></span>
                            @else
                                <span></span>
                            @endif
                        </a>
                        @if (isset($item->children) && count($item->children))
                        <div class="submenu">
                            <div class="group">
                                <div class="item">
                                    @foreach($item->children as $children)
                                        <a href="{{  route('get.category.list', $children->c_slug.'-'.$children->id) }}"
                                           title="{{  $children->c_name }}" class="js-open-menu">
                                            <span>{{  $children->c_name }}</span>
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        @endif
                    </li>
                    @endforeach
                </ul>
            </div>

            
        </div>
        
    </div>
    <!-- <div class="navi">

        <ul>
            <div class="container header-wrapper">
                  <li><a class="active" href="#home">Trang chủ</a></li>
                  <li><a href="#news">Sữa Tăng Cân</a></li>
                  <li><a href="#contact">Whey Protein</a></li>
                  <li><a href="#about">BCAA</a></li>
                  <li><a href="#about">Vitamin, Dầu cá</a></li>
                  <li><a href="#about">Giảm Mỡ</a></li>
            </div>
        </ul>
    </div> -->
</div>

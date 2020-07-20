@extends('layouts.app_master_frontend')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/blog_detail.min.css') }}">
@stop
@section('content')
    <div class="container">
        <div class="breadcrumb">
                    <ul>
                        <li>
                            <a href="http://localhost:8080/frameLaravel/thehinh.vn/public/" title="Home"><span itemprop="title">Trang chủ</span></a>
                        </li>
                        <li>
                            <a href="{{ route('get.blog.home')}}" title="Bài viết"><span itemprop="title">Bài viết</span></a>
                        </li>
                        <li>
                            <a href="javascript://" title="Chi tiết bài viết"><span itemprop="title">{{ $article->a_name}}</span></a>
                        </li>
                    </ul>
                </div>
        <div class="blog-main">
            <div class="left">
                <div class="post-detail">
                    <h1 class="post-detail__title">{{ $article->a_name}}</h1>
                    <p class="post-detail__intro">{{ $article->a_description}}</p>
                    <div class="post-detail__content">
                        {!! $article->a_content !!}
                    </div>
                </div>
            </div>
            <div class="right">
                @include('frontend.components.articles_hot_sidebar_top',['articles' => $articlesHotSidebarTop])
                @include('frontend.components.top_product',['products' => $productTopPay])
                @include('frontend.components.hot_article',['articles'  => $articlesHot])
            </div>
        </div>
    </div>
@stop
@section('script')
    <script src="{{ asset('js/blog_detail.js') }}" type="text/javascript"></script>
@stop
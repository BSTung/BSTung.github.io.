@if (isset($product))
    <div class="product-item">
        <a href="{{ route ('get.product.detail', $product->pro_slug. '-'.$product->id)}}" title="" class="avatar image contain">
            <img alt="" src="{{ pare_url_file($product->pro_avatar) }}" class="lazyload">
        </a>
        <a href="{{ route ('get.product.detail', $product->pro_slug. '-'.$product->id)}}"
         title="{{ $product->pro_name}}" class="title">
            <h3>{{ $product->pro_name}}</h3>
        </a>
        <p class="rating">
            <span>
                @php 
                    $iactive = 0;
                    if ($product->pro_review_total) {
                    $iactive = round($product->pro_review_star / $product->pro_review_total,2);
                } 
                @endphp
                @for($i = 1 ; $i <= 5 ; $i ++)
                    <i class="la la-star {{ $i <= $iactive ? 'active' : '' }}"></i>
                @endfor
            </span>
            <span class="text">{{ $product->pro_review_total}} đánh giá</span>
            
        </p>
        @if ($product->pro_sale)
        	<p>
                <p class="percent">-{{ $product->pro_sale}}%</p>
                @php
                    $price = ((100 - $product->pro_sale) * $product->pro_price) / 100;
                @endphp
                <p class="price">{{ number_format($price,0,',','.')}} đ</p>   
                <p class="price-sale">{{ number_format($product->pro_price,0,',','.')}} đ</p>
            </p>
        @else
        	<p class="price">{{ number_format($product->pro_price,0,',','.')}} đ</p>
        @endif
        
    </div>
@endif
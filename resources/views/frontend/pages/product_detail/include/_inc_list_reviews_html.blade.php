@for ($i = 1; $i <= 10; $i ++)
	<div class="item">
		<p class="item_author">
			<span>{{ $review->user->name ?? "Admin" }}</span>
			<span class="item_success"><i class="la la-check-circle"></i> Đã mua hàng tại TungBS</span>
		</p>
		<div class="item_review">
			<span class="item_review">
				@for ($j = 1; $j <= 5; $j ++)
					<i class="la la-star {{ $j <= rand(1,5) ? 'active' : ''}}"></i>
				@endfor
			</span>
			
			Vị ngon, dễ uống. Tuy nhiên dễ bị đau bụng.
		</div>
		<div class="item_footer">
			<span class="item_time"><i class="la la-clock-o"></i> Đánh giá một ngày trước</span>
		</div>
	</div>
@endfor
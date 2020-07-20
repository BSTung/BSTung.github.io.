<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Slide;
use App\Models\Category;
use App\Models\Event;
use App\Models\Article;
use Illuminate\Support\Facades\Log;

class HomeController extends FrontendController
{
    public function index()
    {
        // Mail::to('buisontung1997@gmail.com')->send(new OrderShipped());   

    	//sản phẩm mới
    	$productsNew = Product::where('pro_active',1)
    		->orderByDesc('id')
    		->limit(4)
    	   ->select('id', 'pro_name', 'pro_slug', 'pro_sale', 'pro_avatar', 'pro_price','pro_review_total', 'pro_review_star')
    		->get();
    	//sản phẩm Hot	
    		$productsHot = Product::where([
    			'pro_active' => 1,
    			'pro_hot'	 => 1
    		])
    		->orderByDesc('id')
    		->limit(4)
    	->select('id', 'pro_name', 'pro_slug', 'pro_sale', 'pro_avatar', 'pro_price','pro_review_total', 'pro_review_star')
    		->get();

        //sản phẩm mua nhiều
            $productsPay = Product::where([
                'pro_active' => 1,
            ])
            ->where('pro_pay','>', 0)
            ->orderByDesc('pro_pay')
            ->limit(10)
           ->select('id', 'pro_name', 'pro_slug', 'pro_sale', 'pro_avatar', 'pro_price','pro_review_total', 'pro_review_star')
            ->get();

        //Lấy Slide trang chủ
        $slides = Slide::where('sd_active',1)
            ->orderBy('sd_sort','asc')
            ->get();

        // Lấy event hiển thị đầu
        $event1 = Event::where('e_position_1',1)
            ->first();

        // Lấy event hiển thị 2
        $event2 = Event::where('e_position_2',1)
            ->first();

            // Lấy event hiển thị 2
        $event3 = Event::where('e_position_3',1)
            ->first();


        //Sản phẩm thuộc danh mục HOT
        $categoriesHot = Category::with([
            'products'  => function($q) {
                $q->select('id', 'pro_name', 'pro_slug','pro_category_id', 'pro_sale', 'pro_avatar', 'pro_price','pro_review_total', 'pro_review_star')
                    ->limit(10)
                    ->orderByDesc('id')
                    ->get();
            }
        ])
        ->where([
            'c_hot'     => 1,
            'c_status'  => 1
        ])->get();


        $articlesHot = Article::where([
            'a_active' => 1,
            'a_hot'    => 1
        ])
        ->select('id','a_name','a_slug','a_description','a_avatar', 'created_at')
        ->orderByDesc('id')
        ->limit(4)
        ->get();

    	$viewData = [
    		'productsNew' => $productsNew,
    		'productsHot' => $productsHot,
            'productsPay' => $productsPay,
            'event1'        => $event1,
            'event2'        => $event2,
            'event3'        => $event3,
            'slides'      => $slides,
            'title_page'  => "Đồ án tốt nghiệp",
            'categoriesHot'  => $categoriesHot,
            'articlesHot'    => $articlesHot
    	];
    	return view('frontend.pages.home.index', $viewData);
    }

    public function getLoadProductRecently(Request $request)
    {
        if ($request->ajax()) {
            $listID = $request->id;
            $products = Product::whereIn('id',$listID)
                ->orderByDesc('id')
                ->limit(5)
                ->select('id','pro_name','pro_slug','pro_sale','pro_avatar','pro_price','pro_review_total','pro_review_star')
                ->get();
            $html = view('frontend.pages.home.include._recently',compact('products'))->render();

            return response()->json(['data' => $html]);
        }
    }

    protected function loadSlideHome(Request $request)
    {
        // Lấy slide trang chủ
        $slides = Slide::where('sd_active',1)
            ->orderBy('sd_sort','asc')
            ->get();

        $html = view('frontend.pages.home.include._inc_slide',compact('slides'))->render();
        return response()->json(['data' => $html]);
    }
}

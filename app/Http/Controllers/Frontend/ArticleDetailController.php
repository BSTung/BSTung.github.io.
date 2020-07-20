<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controller\Frontend;
use Illuminate\Http\Request;
use App\Models\Article;

class ArticleDetailController extends BlogBaseController
{
    public function index(Request $request, $slug) {
    	$arraySlug = explode('-', $slug);
    	$id = array_pop($arraySlug);
    	if ($id) {
    		$article = Article::find($id);
    		$viewData = [
    			'article'                => $article,
                'articlesHotSidebarTop'  => $this->getArticleTopSidebar(),
                'articlesHot'            => $this->getArticleHot(),
                'productTopPay'          => $this->getProductTop()
    		];
    		return view('frontend.pages.article_detail.index', $viewData);
    	}
    	
    		return redirect()->to('/');
    }
}

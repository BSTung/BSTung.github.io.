<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PageStatic;

class PageStaticController extends Controller
{
    public function getShoppingGuide()
    {
    	$page = PageStatic::where('s_type',1)->first();
    	$viewData = [
    		'page'	=> $page
    	];
    	return view('frontend.pages.static.index', $viewData);
    }

    public function getReturnPolicy()
    {
    	$page = PageStatic::where('s_type',2)->first();
    	$viewData = [
    		'page'	=> $page
    	];
    	return view('frontend.pages.static.index', $viewData);	
    }

    public function getCustomerCare()
    {
    	$page = PageStatic::where('s_type',3)->first();
    	$viewData = [
    		'page'	=> $page
    	];
    	return view('frontend.pages.static.index', $viewData);	
    }
}

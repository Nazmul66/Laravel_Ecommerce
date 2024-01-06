<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PageController extends Controller
{
    // frontend home page
    public function Home()
    {
        return view('frontend.pages.home');
    }

    // frontend about page
    public function about()
    {
        return view('frontend.pages.static_pages.about');
    }

    // frontend contact page
    public function contact()
    {
        return view('frontend.pages.static_pages.contact');
    }
    
    public function faq()
    {
        // return view('frontend.pages.home');
    }

    // error 404 is not found 
    public function error404()
    {
        return view('frontend.pages.404');
    }

}

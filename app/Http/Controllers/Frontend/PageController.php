<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Mail\ContactMail;
use Illuminate\Support\Facades\Mail;

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
    
    // Contact email
    public function contact()
    {
        return view('frontend.pages.static_pages.contact');
    }
    
    // Contact form data
    public function contactEmail(Request $request)
    {
        $mailData = [
            'fname'      =>  $request->fname,
            'lname'      =>  $request->lname,
            'phone'      =>  $request->phone,
            'email'      =>  $request->email,
            'message'    =>  $request->message
        ];

        $adminEmail = 'hnazmul748@gmail.com';
        // $adminEmail2 = 'nh4647352@gmail.com';

        Mail::to($adminEmail)->send( new ContactMail($mailData) );
        // For multiple email send
        // Mail::to($adminEmail, $adminEmail2)->send( new ContactMail($mailData) ); 

        $notification = array(
            'message'    => "Thank you! your email has been sent",
            'alert-type' => "success",
        );

        return redirect()->route('contactPage')->with($notification); 
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

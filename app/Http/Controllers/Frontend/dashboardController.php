<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\District;
use App\Models\State;
use App\Models\Country;
use App\Models\User;

class dashboardController extends Controller
{

    public function userLogin()
    {
        return view('frontend.pages.auth-user.login');
    }


    public function userRegister()
    {
        return view('frontend.pages.auth-user.register');
    }


    public function userProfile()
    {
        $states     = State::orderBy('name', 'ASC')->get();
        $districts  = District::orderBy('name', 'ASC')->get();
        $countries  = Country::orderBy('name', 'ASC')->get();
        return view('frontend.pages.customer_pages.profile', compact('states', 'districts', 'countries'));
    }


    public function userForget()
    {
        return view('frontend.pages.auth-user.forget-password');
    }

    
    public function userDashboard()
    {
        $districts  = District::orderBy('name', 'ASC')->where('status', 1)->get();
        $countries  = Country::orderBy('name', 'ASC')->where('status', 1)->get();
        return view('frontend.pages.customer_pages.dashboard', compact('countries', 'districts',));
    }

    public function userInfo(Request $request, string $id)
    {
        $userInfo = User::find($id);

        if( !is_null($userInfo) ){
            $userInfo->name            = $request->name;
            $userInfo->email           = $request->email;
            $userInfo->phone           = $request->phone;

            $userInfo->save();

            $notification = array(
                'message'    => "Your information updated",
                'alert-type' => "success",
            );

            return redirect()->back()->with($notification); 
        }
    }


    public function userShippingInfo(Request $request, string $id)
    {
        $userShipping = User::find($id);



        if( !is_null($userShipping) ){
            $userShipping->address_line1         = $request->address_line1;
            $userShipping->address_line2         = $request->address_line2;
            $userShipping->division_id           = $request->division_id; 
            $userShipping->district_id           = $request->district_id; 
            $userShipping->country_id            = $request->country_id;  
            $userShipping->zipCode               = $request->zipCode;  

            // dd($userShipping);

            $userShipping->save();

            $notification = array(
                'message'    => "Your shipping information updated",
                'alert-type' => "success",
            );

            return redirect()->back()->with($notification); 
        }
    }


}

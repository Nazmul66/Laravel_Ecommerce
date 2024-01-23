<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class dashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function userLogin()
    {
        return view('frontend.pages.auth-user.login');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function userRegister()
    {
        return view('frontend.pages.auth-user.register');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function userDashboard()
    {
        return view('frontend.pages.customer_pages.dashboard');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function userProfile()
    {
        return view('frontend.pages.customer_pages.profile');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function userForget()
    {
        return view('frontend.pages.auth-user.forget-password');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

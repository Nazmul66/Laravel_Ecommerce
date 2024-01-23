<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('frontend.pages.auth-user.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        if( Auth::user()->role == 1 ){
            $notification = array(
                'message'    => "Admin Login successful",
                'alert-type' => "success"
            );
            return redirect()->intended(RouteServiceProvider::ADMIN_HOME)->with($notification);
        }
        else if(Auth::user()->role == 2) {
            $notification = array(
                'message'    => "Customer Login successful",
                'alert-type' => "success"
            );
            return redirect()->intended(RouteServiceProvider::CUSTOMER_HOME)->with($notification);
        }

    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}

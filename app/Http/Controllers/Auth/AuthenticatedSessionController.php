<?php

namespace App\Http\Controllers\Auth;

use App\CustomeClasses\OwnClasses;
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
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(Request $request)
    {

        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $credentials = [
            'user_name' => $request->input('username'),
            'password' => $request->input('password'),
        ];

        if (Auth::attempt($credentials, $request->filled('remember'))) {
            $user = Auth::user();
            if($user->status === 0){
                Auth::guard('web')->logout();
                return redirect()->route('login')->with('error','You are blocked by the admin. Please contact support');
            }
            else{
                OwnClasses::ActivityLoger('success','Login','user Login','User Login Successfully',Auth::user()->id);
                $request->session()->regenerate();
                return redirect()->intended(RouteServiceProvider::HOME)->with('message','Login Successfully');
            }

        }
        else {
            return redirect()->route('login')->with('error','Credentials mismatch');
        }

    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        OwnClasses::ActivityLoger('success','Logout','user logout','user login successfully',Auth::user()->id);
        Auth::guard('web')->logout();
        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('login')->with('message','Logout Successfully');
    }
}

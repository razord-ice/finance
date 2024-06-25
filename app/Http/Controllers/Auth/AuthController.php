<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

/**
 * AuthController
 */
class AuthController extends \App\Http\Controllers\Controller
{
    
    /**
     * Method index
     *
     * @return string|null
     */
    public function index()
    {
        return Auth::check() ? redirect(route('dashboard')) : view('auth.login');
    }
    
    /**
     * Method login
     *
     * @param Request $request
     *
     * @return string|null
     */
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
    
        $credentials = $request->only('email', 'password');
        \Log::info($credentials);
        if (Auth::attempt($credentials)) {
            return redirect()->intended(route('dashboard'))->withSuccess('Signed in');
        }
        
        return redirect(route("login"))->withError('Login details are not valid');
    }
    
    /**
     * Method logout
     *
     * @return string|null
     */
    public function logout() {
        Session::flush();
        Auth::logout();

        return Redirect(route('login'));
    }
}

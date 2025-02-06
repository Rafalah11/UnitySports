<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class loginController extends Controller
{
    public function login()
    {
        return view ('login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->only('username', 'password');
        
        if (Auth::attempt($credentials)) {
            if (Auth::attempt($credentials)) {
                $request->session()->regenerate();
        
                if (Auth::user()->role == 'ADMIN') {
                    return redirect()->intended('landingpageadmin');
                } else {
                    return redirect()->intended('landingpageafterlogin');
                }
            }
        }    
    
        // Authentication failed...
        Session::flash('error', 'Username atau password salah');
        return redirect()->back();
    }

    public function logout()
    {
        Auth::logout();
        return redirect('landingpageNVIP');
    }
}
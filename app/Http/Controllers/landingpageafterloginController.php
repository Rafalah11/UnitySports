<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class landingpageafterloginController extends Controller
{
    public function landingpageafterlogin()
    {
        $user = Auth::user();
        return view('LP/landingpageafterlogin', compact('user'));
    }
    
}

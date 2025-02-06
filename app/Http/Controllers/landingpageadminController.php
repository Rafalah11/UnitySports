<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
class landingpageadminController extends Controller
{
   public function landingpageadmin()
    {
        $user = Auth::user();
        return view('admin/landingpageadmin', compact('user'));
    }
}

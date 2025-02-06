<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class registerController extends Controller
{
    public function showRegistration()
    {
        return view('registerVIP');
    }

    public function RegisterPost(Request $request)
    {
        $request->validate([
            'policy' => 'required|accepted',
        ], [
            'policy.required' => 'Anda harus menyetujui kebijakan kami.',
            'policy.accepted' => 'Anda harus menyetujui kebijakan kami.',
        ]);
        $user = new User();
        $user->username = $request->username;
        $user->password = Hash::make($request->password);
        $user->role = 'NVIP';   
        $user->save();
    
        return redirect()->route('landingpageNVIP')->with('success', 'Register Successfully');
    }
}

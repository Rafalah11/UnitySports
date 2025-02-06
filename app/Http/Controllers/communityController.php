<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Roleuser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class communityController extends Controller
{
    public function community()
    {
        $user = Auth::user();
        $roleusers = Roleuser::all();
        $users = User::all();
        return view('admin.datavip', compact('user', 'roleusers','users'));
    }

    public function edit($id)
    {
        $roleusers = Roleuser::find($id);

        if (!$roleusers) {
            return redirect()->route('admin.datavip')->with('error', 'Lapangan not found');
        }

        return view('admin.editdatavip', compact('roleusers'));
    }
}

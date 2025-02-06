<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class profilController extends Controller
{
    public function show()
    {
        $user = Auth::user();
        return view('account/profile', compact('user'));
    }

    public function show1()
    {
        $user = Auth::user();
        return view('AGD/a', compact('user'));
    }

    public function editProfile()
    {
        $user = Auth::user();
        return view('account/editprofile', compact('user'));
    }

    public function updateProfile(Request $request)
{
    $request->validate([
        'fullname' => 'required|string|max:30', 
        'address' => 'required|string|max:100',
        'city' => 'required|string|max:20',
        'birthplace' => 'required|string|max:255',
        'birthdate' => 'required|date',
        'gender' => 'required|in:Male,Female,Other',
        'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        'WA' => 'required|string|max:15',
        'IG' => 'required|string|max:255',
        'FB' => 'required|string|max:255',
        'gmail' => 'required|string|max:255',
    ]);

    $user = Auth::user();

    $user->fullname = $request->input('fullname');
    $user->address = $request->input('address');
    $user->city = $request->input('city');
    $user->birthplace = $request->input('birthplace');
    $user->birthdate = $request->input('birthdate');
    $user->gender = $request->input('gender');
    $user->WA = $request->input('WA');
    $user->IG = $request->input('IG');
    $user->FB = $request->input('FB');
    $user->gmail = $request->input('gmail');

    if ($request->hasFile('image')) {
        $file = $request->file('image');
        $path = $file->store('profile_images', 'public');
        $user->image = $path;
    }

    dd($user);
    $user->save();

    return redirect()->route('profile.show')->with('success', 'Data berhasil anda perbaharui');
}

public function showadmin()
{
    $user = Auth::user();
    return view('admin/profileadmin', compact('user'));
}

public function editProfileadmin()
{
    $user = Auth::user();
    return view('admin/editprofileadmin', compact('user'));
}

public function updateProfileadmin(Request $request)
{
$request->validate([
    'fullname' => 'required|string|max:30', 
    'address' => 'required|string|max:100',
    'city' => 'required|string|max:20',
    'birthplace' => 'required|string|max:255',
    'birthdate' => 'required|date',
    'gender' => 'required|in:Male,Female,Other',
    'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
    'WA' => 'required|string|max:15',
    'IG' => 'required|string|max:255',
    'FB' => 'required|string|max:255',
    'gmail' => 'required|string|max:255',
]);

$user = Auth::user();

$user->fullname = $request->input('fullname');
$user->address = $request->input('address');
$user->city = $request->input('city');
$user->birthplace = $request->input('birthplace');
$user->birthdate = $request->input('birthdate');
$user->gender = $request->input('gender');
$user->WA = $request->input('WA');
$user->IG = $request->input('IG');
$user->FB = $request->input('FB');
$user->gmail = $request->input('gmail');

if ($request->hasFile('image')) {
    $file = $request->file('image');
    $path = $file->store('profile_images', 'public');
    $user->image = $path;
}

$user->save();

return redirect()->route('profile.showadmin')->with('success', 'Data berhasil anda perbaharui');
}
}


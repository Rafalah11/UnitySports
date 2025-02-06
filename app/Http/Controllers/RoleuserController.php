<?php

namespace App\Http\Controllers;

use App\Models\Roleuser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreroleuserRequest;
use App\Http\Requests\UpdateroleuserRequest;
use Illuminate\Support\Facades\File; 

class RoleuserController extends Controller
{

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'integer|exists:users,id',
            'jenis_transaksi' => 'string',
            'metode_pembayaran' => 'string',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $user = $request->user();

        if ($user->role === 'NVIP') {
          $imagePath = $request->file('gambar')->store('images', 'public');

            $roleUser = new RoleUser();
            $roleUser->user_id = $request->user_id;
            $roleUser->jenis_transaksi = $request->jenis_transaksi;
            $roleUser->metode_pembayaran = $request->metode_pembayaran;
            $roleUser->gambar = $imagePath;
            $roleUser->created_at = now();
            if ($request->hasFile('gambar')) {
                if ($roleUser->gambar && Storage::exists('public/' . $roleUser->gambar)) {
                    Storage::delete('public/' . $roleUser->gambar);
                }
        
                $gambar = $request->file('gambar');
                $gambarName = time() . '_' . $gambar->getClientOriginalName();
                $gambar->storeAs('public/images', $gambarName);
                $roleUser->gambar = '/storage/images/' . $gambarName; 
            }
            $roleUser->save();

            return redirect('landingpageafterlogin')->with('success', 'Data berhasil disimpan.');
        } else {
            return redirect('landingpageafterlogin')->withErrors('ID anda sudah terdaftar menjadi status VIP.');
        }
    }

    public function create()
    {
        //
    }


    public function show(Roleuser $roleuser)
    {
        //
    }


    public function edit(Roleuser $roleuser)
    {
        //
    }

 
    public function update(UpdateroleuserRequest $request, Roleuser $roleuser)
    {
        //
    }


    public function destroy($id)
    {
        $roleuser = Roleuser::find($id);

        if (!$roleuser) {
            return redirect()->route('datavip')->with('error', 'Data  not found');
        }

        $oldImagePath = public_path('uploads/' . $roleuser->gambar);
        if (File::exists($oldImagePath)) {
            File::delete($oldImagePath);
        }

        $roleuser->delete();

        return redirect()->route('datavip')->with('success', 'Data Verifikasi Membership Sudah Dihapus');
    }
}

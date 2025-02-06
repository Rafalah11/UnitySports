<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Agenda;
use App\Models\Provinsi;
use App\Models\Komunitas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class komunitasadminController extends Controller
{
    public function komunitasadmin(Request $request)
    {
        $user = Auth::user();
        $agendas = Agenda::all();
        $provinsis =  $request->input('provinsi');
        $provinsi = $request->input('provinsi');
        $pilihan_olahraga = $request->input('pilihan_olahraga', 'all');
    
        $query = Agenda::query();
    
        if (!empty($provinsi)) {
            $query->where('provinsi', 'LIKE', "%$provinsi%");
        }
    
        if ($pilihan_olahraga !== 'all') {
            $query->where('pilihan_olahraga', $pilihan_olahraga);
        }
    
        $komunitass = $query->get();
    
        if ($request->ajax()) {
            return response()->json(['komunitass' => $komunitass]);
        }
        
        $pilihan_olahraga_options = Agenda::select('pilihan_olahraga')->distinct()->get();
        
        return view('admin.komunitasadmin', compact('komunitass', 'pilihan_olahraga_options', 'user','agendas','provinsis'));
    }

    public function searchByProvincekomunitasadmin(Request $request)
    {
        $user = Auth::user();
        $agendas = Agenda::all();
        $provinsis = $request->input('provinsi');
        $provinsi = $request->input('provinsi');
        $pilihan_olahraga = $request->input('pilihan_olahraga', 'all');
    
        // Query berdasarkan provinsi dan pilihan olahraga jika tidak kosong
        $query = Agenda::query();
        
        if (!empty($provinsi)) {
            $query->where('provinsi', 'LIKE', "%$provinsi%");
        }
    
        if ($pilihan_olahraga !== 'all') {
            $query->where('pilihan_olahraga', $pilihan_olahraga);
        }
    
        $komunitass = $query->get();
    
        return view('admin.komunitasadmin', compact('komunitass', 'provinsi', 'pilihan_olahraga', 'user','agendas','provinsis'));
    }

    public function searchBySportkomunitasadmin(Request $request)
{
    $user = Auth::user();
    $agendas = Agenda::all();
    $provinsis = $request->input('provinsi');
    $pilihan_olahraga = $request->input('pilihan_olahraga');

    if ($pilihan_olahraga == 'all') {
        $komunitass = Agenda::all();
        return view('komunitasadmin', compact('komunitass'));
    } else {
        $komunitass = Agenda::where('pilihan_olahraga', $pilihan_olahraga)->get();
    }

    return view('admin.komunitasadmin', compact('komunitass', 'pilihan_olahraga', 'user','agendas','provinsis'));
}

public function destroy($id)
    {
        $agendas = Agenda::find($id);

        if (!$agendas ) {
            return redirect()->route('komunitasadmin')->with('error', 'Data  not found');
        }

        $agendas->delete();

        return redirect()->route('komunitasadmin')->with('success', 'Kegiatan Komunitas Telah Dihapus');
    }

    public function updateToVIP($id)
{
    // Temukan pengguna berdasarkan ID
    $user = User::findOrFail($id);

    // Cek apakah pengguna sudah VIP atau belum
    if ($user->role !== 'VIP') {
        // Ubah peran menjadi VIP
        $user->role = 'VIP';
        
        // Tetapkan waktu VIP sampai 1 bulan dari sekarang
        $user->vip_until = now()->addMonth();

        // Simpan perubahan
        $user->save();

        return redirect()->back()->with('success', 'Pengguna berhasil diubah menjadi VIP selama 1 bulan.');
    } else {
        return redirect()->back()->with('error', 'Pengguna sudah memiliki status VIP.');
    }
}

public function updateToNVIP($id)
{
    try {
    // Temukan pengguna berdasarkan ID
    $user = User::findOrFail($id);

    // Cek apakah pengguna sudah VIP atau belum
    if ($user->role === 'VIP') {
        // Ubah peran menjadi NVIP
        $user->role = 'NVIP';
        $user->vip_until = null; // Hapus batasan waktu VIP jika ada

        // Simpan perubahan
        $user->save();
        return redirect()->back()->with('success', 'Pengguna berhasil diubah menjadi NVIP');
        } else {
            return response()->json(['error' => 'Pengguna tidak memiliki peran VIP.'], 404);
        }
    } catch (\Exception $e) {
        return response()->json(['error' => 'Terjadi kesalahan saat mengubah peran pengguna.'], 500);
    }
}
}
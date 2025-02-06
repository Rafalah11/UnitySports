<?php

namespace App\Http\Controllers;


use App\Models\Lapangan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class lapanganController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();
        $provinsi = $request->input('provinsi');
        $pilihan_olahraga = $request->input('pilihan_olahraga', 'all');

        $query = Lapangan::query();

        if (!empty($provinsi)) {
            $query->where('provinsi', 'LIKE', "%$provinsi%");
        }

        if ($pilihan_olahraga !== 'all') {
            $query->where('pilihan_olahraga', $pilihan_olahraga);
        }

        $lapangans = $query->get();

        if ($request->ajax()) {
            return response()->json(['lapangans' => $lapangans]);
        }

        $pilihan_olahraga_options = Lapangan::select('pilihan_olahraga')->distinct()->get();

        return view('lapangan.lapangan', compact('lapangans', 'pilihan_olahraga_options', 'user'))->with('success', 'Data berhasil ditambahkan!');
    }

    public function searchByProvincelapangan(Request $request)
    {
        $user = Auth::user();
        $provinsi = $request->input('provinsi');
        $pilihan_olahraga = $request->input('pilihan_olahraga', 'all');
    
        // Query berdasarkan provinsi dan pilihan olahraga jika tidak kosong
        $query = Lapangan::query();
        
        if (!empty($provinsi)) {
            $query->where('provinsi', 'LIKE', "%$provinsi%");
        }
    
        if ($pilihan_olahraga !== 'all') {
            $query->where('pilihan_olahraga', $pilihan_olahraga);
        }
    
        $lapangans = $query->get();
    
        return view('lapangan.lapangan', compact('lapangans', 'provinsi', 'pilihan_olahraga', 'user'));
    }

    public function searchBySportlapangan(Request $request)
{
    $user = Auth::user();
    $pilihan_olahraga = $request->input('pilihan_olahraga');

    if ($pilihan_olahraga == 'all') {
        $lapangans = Lapangan::all();
        return view('lapanganadmin', compact('lapangans'));
    } else {
        $lapangans = Lapangan::where('pilihan_olahraga', $pilihan_olahraga)->get();
    }

    return view('lapangan.lapangan', compact('lapangans', 'pilihan_olahraga', 'user'));
}
}

<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use App\Models\Lapangan;
use App\Models\Provinsi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class lapanganadminController extends Controller
{
    public function lapanganadmin(Request $request)
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

        return view('admin.lapanganadmin', compact('lapangans', 'pilihan_olahraga_options', 'user'))->with('success', 'Data berhasil ditambahkan!');
    }

    public function form()
    {
        $provinsis = Provinsi::all();
        $agendas = Agenda::all();
        return view('admin.formtambahagenda', compact('provinsis','agendas'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_lapangan' => 'required|string|max:100',
            'pilihan_olahraga' => 'required|string',
            'alamat' => 'required|string|max:250',
            'kontak' => 'required|string|max:15',
            'provinsi' => 'required|string|max:255',
            'gambar' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'harga' => 'required|numeric',
            'keterangan_harga' => 'required|string|max:20',
            'kabupaten' => 'required|string|max:25',
            'tanggal' => 'required|date',
        ]);


        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('images', $filename, 'public');
            $validatedData['gambar'] = '/storage/' . $path;
        }
        Lapangan::create($validatedData);
        return redirect()->route('lapanganadmin')->with('success', 'Data berhasil ditambahkan!');
     }

    public function edit($id)
    {
        $provinsis = Provinsi::all();
        $lapangan = Lapangan::find($id);

        if (!$lapangan) {
            return redirect()->route('admin.lapanganadmin')->with('error', 'Lapangan not found');
        }

        return view('admin.editform', compact('lapangan','provinsis'));
    }

    public function update(Request $request, $id)
{
    $lapangan = Lapangan::find($id);

    if (!$lapangan) {
        return redirect()->route('admin.lapanganadmin')->with('error', 'Lapangan not found');
    }

    $validatedData = $request->validate([
        'nama_lapangan' => 'required',
        'pilihan_olahraga' => 'required',
        'harga' => 'required',
        'keterangan_harga' => 'required',
        'kontak' => 'required',
        'created_at' => 'required',
        'provinsi' => 'required',
        'kabupaten' => 'required',
        'alamat' => 'required',
        'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
    ]);

    $lapangan->nama_lapangan = $request->nama_lapangan;
    $lapangan->pilihan_olahraga = $request->pilihan_olahraga;
    $lapangan->harga = $request->harga;
    $lapangan->keterangan_harga = $request->keterangan_harga;
    $lapangan->kontak = $request->kontak;
    $lapangan->created_at = $request->created_at;
    $lapangan->provinsi = $request->provinsi;
    $lapangan->kabupaten = $request->kabupaten;
    $lapangan->alamat = $request->alamat;

    if ($request->hasFile('gambar')) {
        if ($lapangan->gambar && Storage::exists('public/' . $lapangan->gambar)) {
            Storage::delete('public/' . $lapangan->gambar);
        }

        $gambar = $request->file('gambar');
        $gambarName = time() . '_' . $gambar->getClientOriginalName();
        $gambar->storeAs('public/images', $gambarName);
        $lapangan->gambar = '/storage/images/' . $gambarName; 
    }

    $lapangan->save();
    return redirect()->route('lapanganadmin')->with('success', 'Lapangan successfully updated');
}


public function destroy($id)
{
    $lapangan = Lapangan::find($id);

    if (!$lapangan) {
        return redirect()->route('lapanganadmin')->with('error', 'Lapangan not found');
    }

    $oldImagePath = public_path('uploads/' . $lapangan->gambar);
    if (File::exists($oldImagePath)) {
        File::delete($oldImagePath);
    }

    $lapangan->delete();

    return redirect()->route('lapanganadmin')->with('success', 'Lapangan successfully deleted');
}

public function searchByProvincelapanganadmin(Request $request)
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
    
        return view('admin.lapanganadmin', compact('lapangans', 'provinsi', 'pilihan_olahraga', 'user'));
    }

    public function searchBySportlapanganadmin(Request $request)
{
    $user = Auth::user();
    $pilihan_olahraga = $request->input('pilihan_olahraga');

    if ($pilihan_olahraga == 'all') {
        $lapangans = Lapangan::all();
        return view('lapanganadmin', compact('lapangans'));
    } else {
        $lapangans = Lapangan::where('pilihan_olahraga', $pilihan_olahraga)->get();
    }

    return view('admin.lapanganadmin', compact('lapangans', 'pilihan_olahraga', 'user'));
}


}

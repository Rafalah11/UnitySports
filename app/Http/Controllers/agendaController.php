<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use App\Models\Provinsi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AgendaController extends Controller
{
    public function agenda()
    {
        // Ambil semua pilihan olahraga yang tersedia dari model Agenda
        $pilihan_olahraga = Agenda::select('pilihan_olahraga')->distinct()->get();
        
        // Kirimkan data pilihan olahraga ke view
        return view('AGD.agenda', compact('pilihan_olahraga'));
    }

    public function navbar()
    {
        return view('AGD.navbar');
    }
   

    public function index(Request $request)
    {
        $user = Auth::user();
        $provinsi = $request->input('provinsi');
        $pilihan_olahraga = $request->input('pilihan_olahraga', 'all');
    
        $query = Agenda::query();
    
        if (!empty($provinsi)) {
            $query->where('provinsi', 'LIKE', "%$provinsi%");
        }
    
        if ($pilihan_olahraga !== 'all') {
            $query->where('pilihan_olahraga', $pilihan_olahraga);
        }
    
        $agendas = $query->get();
    
        if ($request->ajax()) {
            return response()->json(['agendas' => $agendas]);
        }
        
        $pilihan_olahraga_options = Agenda::select('pilihan_olahraga')->distinct()->get();
        
        return view('AGD.agenda', compact('agendas', 'pilihan_olahraga_options', 'user'));
    }

    public function searchByProvince(Request $request)
    {
        $user = Auth::user();
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
    
        $agendas = $query->get();
    
        return view('AGD.agenda', compact('agendas', 'provinsi', 'pilihan_olahraga', 'user'));
    }

    public function searchBySport(Request $request)
{
    $user = Auth::user();
    $pilihan_olahraga = $request->input('pilihan_olahraga');

    if ($pilihan_olahraga == 'all') {
        $agendas = Agenda::all();
        return view('AGD.agenda', compact('agendas'));
    } else {
        $agendas = Agenda::where('pilihan_olahraga', $pilihan_olahraga)->get();
    }

    return view('AGD.agenda', compact('agendas', 'pilihan_olahraga', 'user'));
}

public function form()
{
    $provinsis = Provinsi::all();
    return view('AGD.formagenda', compact('provinsis'));
}

public function store(Request $request)
{
    $validatedData = $request->validate([
        'nama_komunitas' => 'required|string|max:100',
        'nama_lapangan' => 'required|string|max:100',
        'pilihan_olahraga' => 'required|string',
        'alamat' => 'required|string|max:250',
        'level' => 'required|string|max:1',
        'kontak' => 'required|string|max:16',
        'provinsi' => 'required|string|max:255',
        'gambar' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        'harga' => 'required|numeric',
        'keterangan_harga' => 'required|string|max:20',
        'nama_kabupaten' => 'required|string|max:100',
        'tanggal' => 'required|date',
        'waktu_mulai' => 'required|date_format:H:i',
        'waktu_selesai' => 'required|date_format:H:i|after:waktu_mulai',
    ]);


    $agenda = new Agenda();
    $agenda->nama_komunitas = $request->input('nama_komunitas');
    $agenda->nama_lapangan = $request->input('nama_lapangan');
    $agenda->pilihan_olahraga = $request->input('pilihan_olahraga');
    $agenda->level = $request->input('level');
    $agenda->harga = $request->input('harga');
    $agenda->keterangan_harga = $request->input('keterangan_harga');
    $agenda->kontak = '+' . $request->input('kontak');
    $agenda->created_at = $request->input('created_at');
    $agenda->provinsi = $request->input('provinsi');
    $agenda->waktu_mulai = $request->input('waktu_mulai');
    $agenda->waktu_selesai = $request->input('waktu_selesai');
    $agenda->tanggal = $request->input('tanggal');
    $agenda->nama_kabupaten = $request->input('nama_kabupaten');
    $agenda->alamat = $request->input('alamat');
    $agenda->gambar = $request->file('gambar')->store('gambar', 'public');

    if ($request->hasFile('gambar')) {
        if ($agenda->gambar && Storage::exists('public/' . $agenda->gambar)) {
            Storage::delete('public/' . $agenda->gambar);
        }

        $gambar = $request->file('gambar');
        $gambarName = time() . '_' . $gambar->getClientOriginalName();
        $gambar->storeAs('public/images', $gambarName);
        $agenda->gambar = '/storage/images/' . $gambarName; 
    }
    
    $agenda->save();

    return redirect()->route('agenda')->with('success', 'Data berhasil disimpan!');
}
}
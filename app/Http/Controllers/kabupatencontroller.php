<?php

namespace App\Http\Controllers;

use App\Models\Provinsi;
use App\Models\Kabupaten;
use Illuminate\Http\Request;

class kabupatencontroller extends Controller
{

    public function index()
    {
        $provinsis = Provinsi::all(); // Ambil semua data provinsi dari tabel provinsi
        return view('admin.formtambahagenda', compact('provinsis')); // Kirimkan data provinsi ke view
    }

    public function getKabupatenByProvinsi($id_provinsi)
    {
        $kabupaten = Kabupaten::where('id_provinsi', $id_provinsi)->get();
        return response()->json($kabupaten);
    }


    public function index123()
    {
        $provinsis = Provinsi::all(); 
        return view('AGD.formagenda', compact('provinsis')); 
    }

    public function getKabupatenByProvinsi123($id_provinsi)
    {
        $kabupaten = Kabupaten::where('id_provinsi', $id_provinsi)->get();
        return response()->json($kabupaten);
    }

}

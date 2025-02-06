<?php

namespace App\Http\Controllers;

use App\Models\Lapangan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class agendaadminController extends Controller
{
    public function agendaadmin(Request $request)
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
        
        return view('admin.agendaadmin', compact('agendas', 'pilihan_olahraga_options', 'user'));
    }

}

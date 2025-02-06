<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kabupaten extends Model
{
    protected $table = 'kabupaten';
    // Jika tabel Anda memiliki kolom lain yang dapat diisi, tambahkan di sini
    protected $fillable = [
            'id_kabupaten',	
            'id_provinsi',	
            'nama_kabupaten',	
    ];
}

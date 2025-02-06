<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    use HasFactory;

    protected $table = 'agenda';
    // Jika tabel Anda memiliki kolom lain yang dapat diisi, tambahkan di sini
    protected $fillable = [		
        'nama_komunitas','nama_lapangan', 'pilihan_olahraga', 'harga', 'keterangan_harga', 
        'alamat', 'kontak', 'provinsi','level', 'nama_kabupaten', 'gambar', 'tanggal', 'waktu_mulai','waktu_selesai',
    ];
}

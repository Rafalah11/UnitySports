<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lapangan extends Model
{
    use HasFactory;
    protected $table = 'lapangan'; // pastikan ini sesuai dengan nama tabel di database

    protected $fillable = [
        'nama_lapangan',
        'pilihan_olahraga',
        'alamat',
        'kontak',
        'provinsi',
        'gambar',
        'harga',
        'keterangan_harga',
        'kabupaten',
        'tanggal',
    ];
}


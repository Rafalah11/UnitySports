<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class komunitas extends Model
{
    use HasFactory;
    protected $table = 'komunitas';
    // Jika tabel Anda memiliki kolom lain yang dapat diisi, tambahkan di sini
    protected $fillable = [
        'nama_komunitas',
        'username',
        'pilihan_olahraga',
        'kontak',
    ];
}

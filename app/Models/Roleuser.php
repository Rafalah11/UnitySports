<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class roleuser extends Model
{
    use HasFactory;
    protected $table = 'roleuser';
    protected $fillable = [
        'id',
        'user_id',
        'jenis_transaksi',
        'metode_pembayaran',
        'gambar',
    ];
}

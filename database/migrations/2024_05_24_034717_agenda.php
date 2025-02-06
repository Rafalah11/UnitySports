<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('agenda', function (Blueprint $table) {
            $table->id();
            $table->enum('pilihan_olahraga', ['BADMINTON','SEPAK BOLA','FUTSAL','BASKET', 'MINI SOCCER']);
            $table->integer('harga')->nullable();
            $table->string('level')->nullable();
            $table->string('alamat')->nullable();
            $table->string('kontak')->nullable();
            $table->string('provinsi')->nullable();
            $table->string('gambar')->nullable();
            $table->string('nama_komunitas')->nullable();
            $table->String('keterangan_harga')->nullable();
            $table->String('tanggal')->nullable();
            $table->String('waktu_mulai')->nullable();
            $table->String('waktu_selesai')->nullable();
            $table->String('nama_lapangan')->nullable();
            $table->string('nama_kabupaten')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agenda');
    }
};

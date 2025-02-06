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
        Schema::create('lapangan', function (Blueprint $table) {
            $table->id();
            $table->string('nama_lapangan')->nullable();
            $table->enum('pilihan_olahraga', ['BADMINTON', 'FUTSAL', 'SEPAK BOLA']);
            $table->string('alamat')->nullable();
            $table->string('kontak')->nullable();
            $table->string('provinsi')->nullable();
            $table->string('gambar')->nullable();
            $table->integer('harga')->nullable();
            $table->String('keterangan_harga')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lapangan');
    }
};

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
        Schema::create('komunitas', function (Blueprint $table) {
            $table->id();
            $table->string('nama_komunitas')->nullable();
            $table->string('username')->nullable();
            $table->enum('pilihan_olahraga', ['BADMINTON', 'FUTSAL', 'SEPAK BOLA']);
            $table->string('kontak')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::create('komunitas', function (Blueprint $table) {
            $table->id();
            $table->string('nama_komunitas')->nullable();
            $table->string('username')->nullable();
            $table->enum('pilihan_olahraga', ['BADMINTON', 'FUTSAL', 'SEPAK BOLA']);
            $table->string('kontak')->nullable();
            $table->timestamps();
        });
    }
};

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
        Schema::create('kabupaten', function (Blueprint $table) {
            $table->id('id_kabupaten');
            $table->unsignedBigInteger('id_provinsi')->nullable();
            $table->string('nama_kabupaten')->nullable();
            $table->timestamps();

            // Add the foreign key constraint
            $table->foreign('id_provinsi')->references('id_provinsi')->on('provinsi')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kabupaten');
    }
};

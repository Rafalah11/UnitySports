<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('username');
            $table->string('password');
            $table->enum('role', ['ADMIN','VIP', 'NVIP'])->default('NVIP');
            $table->string('email')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->string('image')->nullable(); 
            $table->string('birthplace')->nullable(); 
            $table->date('birthdate')->nullable(); 
            $table->string('address')->nullable();
            $table->string('fullname')->nullable();
            $table->string('city')->nullable();
            $table->enum('gender', ['Male', 'Female', 'Other'])->nullable(); 
            $table->string('WA')->nullable();
            $table->string('IG')->nullable();
            $table->string('FB')->nullable();
            $table->string('gmail')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};

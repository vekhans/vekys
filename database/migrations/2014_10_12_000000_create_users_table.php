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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('lengkap')->default('Veky Hanas');
            $table->enum('gender',['Laki-laki','Perempuan'])->default('Laki-laki');
            $table->text('alamat')->nullable();
            $table->string('telepon')->nullable();
            $table->text('pendidikan')->nullable();
            $table->text('pengalaman')->nullable();
            $table->text('skill')->nullable(); 
            $table->text('tentang')->nullable(); 
            $table->string('file')->default('storage/media/veky.png');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};

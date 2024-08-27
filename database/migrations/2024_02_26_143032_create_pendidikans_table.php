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
        Schema::create('pendidikans', function (Blueprint $table) {
            $table->id();
            $table->text('nama');
            $table->integer('tahun_masuk');
            $table->integer('tahun_keluar');
            $table->text('gelar');
            $table->unsignedBigInteger('id_user');
            $table->timestamps();
        });
        schema::table('pendidikans', function($table){
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
        });
    } 
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropForeign(['id_user']);
        Schema::dropIfExists('pendidikans');
    }
};

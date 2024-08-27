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
        Schema::create('pengalamans', function (Blueprint $table) {
            $table->id();
            $table->text('tempat');
            $table->longtext('deskripsi');
            $table->unsignedBigInteger('id_user');
            $table->timestamps();
        });
        schema::table('pengalamans', function($table){
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengalamans');
        Schema::dropForeign(['id_user']);
    }
};

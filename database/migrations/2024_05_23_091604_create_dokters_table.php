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
        Schema::create('dokters', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique();
            $table->string('id_dokter');
            $table->string('name');
            $table->string('alamat');
            $table->string('no_hp');
            $table->string('password');
            $table->string('spesialis');
            $table->string('deskripsi');
            $table->string('jadwal');
            $table->string('image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dokters');
    }
};

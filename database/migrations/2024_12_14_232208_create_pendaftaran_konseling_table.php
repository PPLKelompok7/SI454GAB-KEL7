<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pendaftaran_konseling', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sesi_konseling_id')->constrained('sesi_konseling')->onDelete('cascade');
            $table->foreignId('mahasiswa_id')->constrained('users')->onDelete('cascade');
            $table->string('nim');
            $table->string('jurusan');
            $table->string('fakulitas');
            $table->date('tempat_tanggal_lahir')->comment('tempat tanggal lahir, tapi value cuma tanggal lahir aja');
            $table->string('phone');
            $table->text('keluhan');
            $table->enum('status', ['Menunggu', 'Terverifikasi', 'Selesai'])->default('Menunggu');
            $table->string('link')->nullable();
            $table->text('kesimpulan')->nullable();
            $table->timestamps();           
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pendaftaran_konseling');
    }
};

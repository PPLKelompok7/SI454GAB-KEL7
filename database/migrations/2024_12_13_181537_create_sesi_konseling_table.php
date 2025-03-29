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
        Schema::create('sesi_konseling', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('konselor_id');
            $table->enum('sesi', ['08:00-09:00', '09:00-10:00', '10:00-11:00', '13:00-14:00', '14:00-15:00']);
            $table->enum('hari', ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat']);
            $table->enum('status', ['Tersedia', 'Terisi'])->default('Tersedia');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('konselor_id')->references('id')->on('konselor')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sesi_konseling');
    }
};

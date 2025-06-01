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
        Schema::create('komunitas', function (Blueprint $table) {
            $table->id();
            $table->string("nama_komunitas");
            $table->string("kategori");
            $table->string("deskripsi");
            $table->string("artikel");
            $table->string("img_path");
            // $table->string("created_at");
            // $table->string("updated_at");
            $table->string("deleted_at");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('komunitas');
    }
};

<?php
// database/migrations/2024_12_11_000001_create_barang_masuk_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('barang_masuk', function (Blueprint $table) {
            $table->id();
            $table->string('nama_barang');
            $table->date('tanggal');
            $table->string('satuan');
            $table->integer('quantity');
            $table->integer('jumlah_box');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('barang_masuk');
    }
};
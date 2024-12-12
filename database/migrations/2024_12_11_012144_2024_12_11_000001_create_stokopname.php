<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('stok_opname', function (Blueprint $table) {
            $table->id();
            $table->string('nama_barang');
            $table->integer('stok_awal');
            $table->integer('barang_masuk');
            $table->integer('barang_keluar');
            $table->integer('stok_akhir');
            $table->date('tanggal');
            $table->string('keterangan')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('stok_opname');
    }
};
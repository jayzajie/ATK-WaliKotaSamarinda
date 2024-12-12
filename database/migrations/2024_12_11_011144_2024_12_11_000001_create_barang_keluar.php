<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('barang_keluar', function (Blueprint $table) {
            $table->id();
            $table->string('nama_barang');
            $table->date('tanggal');
            $table->string('satuan');
            $table->integer('sisa');
            $table->string('nama_penerima');
            $table->string('sub_bagian')->nullable();
            $table->string('sub_tu')->nullable();
            $table->string('sub_pegawaian')->nullable();
            $table->string('sub_perencanaan')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('barang_keluar');
    }
};
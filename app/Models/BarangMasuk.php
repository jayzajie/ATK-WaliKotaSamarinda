<?php
// app/Models/BarangMasuk.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangMasuk extends Model
{
    use HasFactory;

    protected $table = 'barang_masuk';
    
    protected $fillable = [
        'nama_barang',
        'tanggal',
        'satuan',
        'quantity',
        'jumlah_box'
    ];

    protected $casts = [
        'tanggal' => 'date',
        'quantity' => 'integer',
        'jumlah_box' => 'integer'
    ];
}
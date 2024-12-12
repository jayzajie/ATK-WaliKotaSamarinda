<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangKeluar extends Model
{
    use HasFactory;

    protected $table = 'barang_keluar';
    
    protected $fillable = [
        'nama_barang',
        'tanggal',
        'satuan',
        'sisa',
        'nama_penerima',
        'sub_bagian',
        'sub_tu',
        'sub_pegawaian',
        'sub_perencanaan'
    ];

    protected $casts = [
        'tanggal' => 'date',
        'sisa' => 'integer'
    ];
}
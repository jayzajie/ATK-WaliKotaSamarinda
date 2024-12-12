<?php

namespace App\Http\Controllers;

use App\Models\StokOpname;
use App\Models\BarangMasuk;
use App\Models\BarangKeluar;
use Illuminate\Http\Request;

class StokOpnameController extends Controller
{
    public function index()
{
    $barangMasuk = BarangMasuk::selectRaw('nama_barang, SUM(quantity) as total_masuk')
        ->groupBy('nama_barang')
        ->get();

    $barangKeluar = BarangKeluar::selectRaw('nama_barang, SUM(sisa) as total_keluar')
        ->groupBy('nama_barang')
        ->get();

    $stokOpname = collect();
    foreach ($barangMasuk as $masuk) {
        $keluar = $barangKeluar->where('nama_barang', $masuk->nama_barang)->first();
        $stokAkhir = $masuk->total_masuk - ($keluar ? $keluar->total_keluar : 0);
        
        $stokOpname->push([
            'nama_barang' => $masuk->nama_barang,
            'stok_awal' => $masuk->total_masuk,
            'barang_keluar' => $keluar ? $keluar->total_keluar : 0,
            'stok_akhir' => $stokAkhir
        ]);
    }

    return view('templates.stok-opname', compact('stokOpname'));
}


    public function exportPDF()
    {
        $barangMasuk = BarangMasuk::selectRaw('nama_barang, SUM(quantity) as total_masuk')
            ->groupBy('nama_barang')
            ->get();

        $barangKeluar = BarangKeluar::selectRaw('nama_barang, SUM(sisa) as total_keluar')
            ->groupBy('nama_barang')
            ->get();

        $stokOpname = [];
        foreach ($barangMasuk as $masuk) {
            $keluar = $barangKeluar->where('nama_barang', $masuk->nama_barang)->first();
            $stokAkhir = $masuk->total_masuk - ($keluar ? $keluar->total_keluar : 0);
            
            $stokOpname[] = [
                'nama_barang' => $masuk->nama_barang,
                'stok_awal' => $masuk->total_masuk,
                'barang_keluar' => $keluar ? $keluar->total_keluar : 0,
                'stok_akhir' => $stokAkhir
            ];
        }

        $pdf = PDF::loadView('pdf.stok-opname', compact('stokOpname'));
        return $pdf->download('stok-opname.pdf');
    }
}
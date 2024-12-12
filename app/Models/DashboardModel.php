<?php

namespace App\Models;

use App\Models\BarangMasuk;
use App\Models\BarangKeluar;

class DashboardModel
{
    public function getTotalBarangMasuk()
    {
        return BarangMasuk::sum('quantity');
    }

    public function getTotalBarangKeluar()
    {
        return BarangKeluar::sum('sisa');
    }

    public function getStokTersedia()
    {
        $totalBarangMasuk = $this->getTotalBarangMasuk();
        $totalBarangKeluar = $this->getTotalBarangKeluar();
        return $totalBarangMasuk - $totalBarangKeluar;
    }

    public function getPersentaseStok()
    {
        $totalBarangMasuk = $this->getTotalBarangMasuk();
        $stokTersedia = $this->getStokTersedia();
        return ($totalBarangMasuk > 0) ? ($stokTersedia / $totalBarangMasuk) * 100 : 0;
    }

    public function getBarangMasukData()
    {
        return BarangMasuk::selectRaw('DATE_FORMAT(tanggal, "%M") as bulan, SUM(quantity) as total')
            ->groupBy('bulan')
            ->orderBy('tanggal')
            ->get();
    }

    public function getBarangKeluarData()
    {
        return BarangKeluar::selectRaw('DATE_FORMAT(tanggal, "%M") as bulan, SUM(sisa) as total')
            ->groupBy('bulan')
            ->orderBy('tanggal')
            ->get();
    }
}
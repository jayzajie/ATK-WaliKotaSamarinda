<?php

namespace App\Http\Controllers;

use App\Models\DashboardModel;
use Illuminate\Support\Facades\Log;

class DashboardController extends Controller
{
    public function dashboard()
    {
        try {
            $dashboardModel = new DashboardModel();

            $totalBarangMasuk = $dashboardModel->getTotalBarangMasuk();
            $totalBarangKeluar = $dashboardModel->getTotalBarangKeluar();
            $stokTersedia = $dashboardModel->getStokTersedia();
            $persentaseStok = $dashboardModel->getPersentaseStok();
            $barangMasuk = $dashboardModel->getBarangMasukData();
            $barangKeluar = $dashboardModel->getBarangKeluarData();

            return view('templates.index', compact(
                'totalBarangMasuk',
                'totalBarangKeluar',
                'stokTersedia',
                'persentaseStok',
                'barangMasuk',
                'barangKeluar'
            ));
        } catch (\Exception $e) {
            Log::error('Error in DashboardController: ' . $e->getMessage());
            return redirect()->back()->with('error', 'An error occurred. Please try again later.');
        }
    }
}
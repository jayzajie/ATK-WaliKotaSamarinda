<?php

namespace App\Http\Controllers;

use App\Models\BarangKeluar;
use Illuminate\Http\Request;

class BarangKeluarController extends Controller
{
    public function index()
    {
        $barangKeluar = BarangKeluar::orderBy('tanggal', 'desc')->get();
        return view('templates.barang-keluar', compact('barangKeluar'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_barang' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'satuan' => 'required|string|max:50',
            'sisa' => 'required|integer|min:0',
            'nama_penerima' => 'required|string|max:255',
            'sub_bagian' => 'nullable|string|max:255',
            'sub_tu' => 'nullable|string|max:255',
            'sub_pegawaian' => 'nullable|string|max:255',
            'sub_perencanaan' => 'nullable|string|max:255'
        ]);

        BarangKeluar::create($request->all());
        
        return redirect()->route('barang-keluar')
            ->with('success', 'Data barang keluar berhasil ditambahkan');
    }

    public function show($id)
    {
        $barang = BarangKeluar::findOrFail($id);
        return response()->json($barang);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_barang' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'satuan' => 'required|string|max:50',
            'sisa' => 'required|integer|min:0',
            'nama_penerima' => 'required|string|max:255',
            'sub_bagian' => 'nullable|string|max:255',
            'sub_tu' => 'nullable|string|max:255',
            'sub_pegawaian' => 'nullable|string|max:255',
            'sub_perencanaan' => 'nullable|string|max:255'
        ]);

        $barang = BarangKeluar::findOrFail($id);
        $barang->update($request->all());

        return redirect()->route('barang-keluar')
            ->with('success', 'Data barang keluar berhasil diupdate');
    }

    public function destroy($id)
    {
        $barang = BarangKeluar::findOrFail($id);
        $barang->delete();

        return redirect()->route('barang-keluar')
            ->with('success', 'Data barang keluar berhasil dihapus');
    }
}
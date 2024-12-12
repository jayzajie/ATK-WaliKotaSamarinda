<?php

namespace App\Http\Controllers;

use App\Models\BarangMasuk;
use Illuminate\Http\Request;

class BarangMasukController extends Controller
{
    public function index()
    {
        $barangMasuk = BarangMasuk::orderBy('tanggal', 'desc')->get();
        return view('templates.barang-masuk', compact('barangMasuk'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_barang' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'satuan' => 'required|string|max:50',
            'quantity' => 'required|integer|min:1',
            'jumlah_box' => 'required|integer|min:1'
        ]);

        BarangMasuk::create($request->all());
        
        return redirect()->route('barang-masuk')->with('success', 'Barang berhasil ditambahkan');
    }

    public function show($id)
    {
        $barang = BarangMasuk::findOrFail($id);
        return response()->json($barang);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_barang' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'satuan' => 'required|string|max:50',
            'quantity' => 'required|integer|min:1',
            'jumlah_box' => 'required|integer|min:1'
        ]);

        $barang = BarangMasuk::findOrFail($id);
        $barang->update($request->all());

        return redirect()->route('barang-masuk')->with('success', 'Barang berhasil diupdate');
    }

    public function destroy($id)
    {
        $barang = BarangMasuk::findOrFail($id);
        $barang->delete();

        return redirect()->route('barang-masuk')->with('success', 'Barang berhasil dihapus');
    }
}
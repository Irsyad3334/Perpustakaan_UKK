<?php

namespace App\Http\Controllers;

use App\Models\Rak;
use Illuminate\Http\Request;

class RakController extends Controller
{
    // Menampilkan daftar rak
    public function index()
    {
        $raks = Rak::all();
        return view('admin.rak.index', compact('raks'));
    }

    // Menampilkan form untuk menambah rak
    public function create()
    {
        return view('admin.rak.create');
    }

    // Menyimpan data rak baru
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'kode_rak' => 'required|unique:tbl_rak,kode_rak',
            'rak' => 'required|unique:tbl_rak,rak',
        ]);

        // Simpan data rak ke database
        Rak::create($request->all());

        return redirect()->route('rak.index')->with('success', 'Rak berhasil ditambahkan.');
    }

    // Menampilkan form untuk mengedit rak
    public function edit($id)
    {
        $rak = Rak::findOrFail($id);
        return view('admin.rak.edit', compact('rak'));
    }

    // Mengupdate data rak
    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'kode_rak' => 'required|unique:tbl_rak,kode_rak,' . $id . ',id_rak',
            'rak' => 'required|unique:tbl_rak,rak,' . $id . ',id_rak',
        ]);

        // Cari dan update data rak
        $rak = Rak::findOrFail($id);
        $rak->update($request->all());

        return redirect()->route('rak.index')->with('success', 'Rak berhasil diupdate.');
    }

    // Menghapus data rak
    public function destroy($id)
    {
        $rak = Rak::findOrFail($id);
        $rak->delete();

        return redirect()->route('rak.index')->with('success', 'Rak berhasil dihapus.');
    }
}

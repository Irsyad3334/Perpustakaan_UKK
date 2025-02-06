<?php

// app/Http/Controllers/PenerbitController.php
namespace App\Http\Controllers;

use App\Models\Penerbit;
use Illuminate\Http\Request;

class PenerbitController extends Controller
{
    // Menampilkan daftar penerbit
    public function index()
    {
        $penerbit = Penerbit::all();
        return view('admin.penerbit.index', compact('penerbit'));
    }

    // Menampilkan form untuk menambah penerbit
    public function create()
    {
        return view('admin.penerbit.create');
    }

    // Menyimpan data penerbit baru
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'kode_penerbit' => 'required|unique:tbl_penerbit,kode_penerbit|max:10',
            'nama_penerbit' => 'required|unique:tbl_penerbit,nama_penerbit|max:50',
            'no_telp' => 'nullable|max:15',
            'email' => 'nullable|email|max:30',
            'fax' => 'nullable|max:15',
            'website' => 'nullable|max:50',
            'kontak' => 'nullable|max:50',
        ]);

        // Menyimpan data penerbit
        Penerbit::create($request->all());

        // Redirect ke halaman daftar penerbit
        return redirect()->route('penerbit.index')->with('success', 'Penerbit berhasil ditambahkan!');
    }

    // Menampilkan detail penerbit
    public function show($id)
    {
        $penerbit = Penerbit::findOrFail($id);
        return view('admin.penerbit.show', compact('penerbit'));
    }

    // Menampilkan form untuk mengedit penerbit
    public function edit($id)
    {
        $penerbit = Penerbit::findOrFail($id);
        return view('admin.penerbit.edit', compact('penerbit'));
    }

    // Mengupdate data penerbit
    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'kode_penerbit' => 'required|max:10|unique:tbl_penerbit,kode_penerbit,' . $id . ',id_penerbit',
            'nama_penerbit' => 'required|max:50|unique:tbl_penerbit,nama_penerbit,' . $id . ',id_penerbit',
            'no_telp' => 'nullable|max:15',
            'email' => 'nullable|email|max:30',
            'fax' => 'nullable|max:15',
            'website' => 'nullable|max:50',
            'kontak' => 'nullable|max:50',
        ]);

        // Cari penerbit dan update
        $penerbit = Penerbit::findOrFail($id);
        $penerbit->update($request->all());

        // Redirect ke halaman daftar penerbit
        return redirect()->route('penerbit.index')->with('success', 'Penerbit berhasil diperbarui!');
    }

    // Menghapus data penerbit
    public function destroy($id)
    {
        // Cari dan hapus data penerbit
        $penerbit = Penerbit::findOrFail($id);
        $penerbit->delete();

        // Redirect ke halaman daftar penerbit
        return redirect()->route('penerbit.index')->with('success', 'Penerbit berhasil dihapus!');
    }
}

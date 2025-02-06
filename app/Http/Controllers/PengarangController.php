<?php

// app/Http/Controllers/PengarangController.php
namespace App\Http\Controllers;

use App\Models\Pengarang;
use Illuminate\Http\Request;

class PengarangController extends Controller
{
    // Menampilkan daftar pengarang
    public function index()
    {
        $pengarang = Pengarang::all();
        return view('admin.pengarang.index', compact('pengarang'));
    }

    // Menampilkan form untuk menambah pengarang
    public function create()
    {
        return view('admin.pengarang.create');
    }

    // Menyimpan data pengarang baru
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'kode_pengarang' => 'required|unique:tbl_pengarang,kode_pengarang|max:10',
            'nama_pengarang' => 'required|unique:tbl_pengarang,nama_pengarang|max:50',
            'no_telp' => 'nullable|max:15',
            'email' => 'nullable|email|max:30',
            'website' => 'nullable|max:50',
            'biografi' => 'nullable',
            'keterangan' => 'nullable|max:50',
        ]);

        // Menyimpan data pengarang
        Pengarang::create($request->all());

        // Redirect ke halaman daftar pengarang
        return redirect()->route('pengarang.index')->with('success', 'Pengarang berhasil ditambahkan!');
    }

    // Menampilkan detail pengarang
    public function show($id)
    {
        $pengarang = Pengarang::findOrFail($id);
        return view('admin.pengarang.show', compact('pengarang'));
    }

    // Menampilkan form untuk mengedit pengarang
    public function edit($id)
    {
        $pengarang = Pengarang::findOrFail($id);
        return view('admin.pengarang.edit', compact('pengarang'));
    }

    // Mengupdate data pengarang
    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'kode_pengarang' => 'required|max:10|unique:tbl_pengarang,kode_pengarang,' . $id . ',id_pengarang',
            'nama_pengarang' => 'required|max:50|unique:tbl_pengarang,nama_pengarang,' . $id . ',id_pengarang',
            'no_telp' => 'nullable|max:15',
            'email' => 'nullable|email|max:30',
            'website' => 'nullable|max:50',
            'biografi' => 'nullable',
            'keterangan' => 'nullable|max:50',
        ]);

        // Cari pengarang dan update
        $pengarang = Pengarang::findOrFail($id);
        $pengarang->update($request->all());

        // Redirect ke halaman daftar pengarang
        return redirect()->route('pengarang.index')->with('success', 'Pengarang berhasil diperbarui!');
    }

    // Menghapus data pengarang
    public function destroy($id)
    {
        // Cari dan hapus data pengarang
        $pengarang = Pengarang::findOrFail($id);
        $pengarang->delete();

        // Redirect ke halaman daftar pengarang
        return redirect()->route('pengarang.index')->with('success', 'Pengarang berhasil dihapus!');
    }
}

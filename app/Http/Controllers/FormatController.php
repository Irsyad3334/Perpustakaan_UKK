<?php

namespace App\Http\Controllers;

use App\Models\Format;
use Illuminate\Http\Request;

class FormatController extends Controller
{
    // Menampilkan daftar format
    public function index()
    {
        $formats = Format::all();
        return view('admin.format.index', compact('formats'));
    }

    // Menampilkan form untuk menambah format
    public function create()
    {
        return view('admin.format.create');
    }

    // Menyimpan data format baru
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'kode_format' => 'required|unique:tbl_format,kode_format',  // Validasi kode format unik
            'format' => 'required|unique:tbl_format,format',              // Validasi format unik
        ]);

        // Simpan data ke database
        Format::create([
            'kode_format' => $request->kode_format,
            'format' => $request->format,
            'keterangan' => $request->keterangan,
        ]);

        // Redirect ke halaman daftar format
        return redirect()->route('format.index')->with('success', 'Format berhasil ditambahkan');
    }

    // Menampilkan detail format
    public function show($id)
    {
        $format = Format::findOrFail($id);
        return view('admin.format.show', compact('format'));
    }

    // Menampilkan form untuk mengedit format
    public function edit($id)
    {
        $format = Format::findOrFail($id);
        return view('admin.format.edit', compact('format'));
    }

    // Mengupdate data format
    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'kode_format' => 'required|unique:tbl_format,kode_format,' . $id . ',id_format',  // Validasi untuk update
            'format' => 'required|unique:tbl_format,format,' . $id . ',id_format', // Validasi untuk update
        ]);

        // Cari dan update data format
        $format = Format::findOrFail($id);
        $format->update([
            'kode_format' => $request->kode_format,
            'format' => $request->format,
            'keterangan' => $request->keterangan,
        ]);

        // Redirect setelah berhasil
        return redirect()->route('format.index')->with('success', 'Format berhasil diperbarui');
    }

    // Menghapus data format
    public function destroy($id)
    {
        // Cari dan hapus data format
        $format = Format::findOrFail($id);
        $format->delete();

        // Redirect setelah berhasil
        return redirect()->route('format.index')->with('success', 'Format berhasil dihapus');
    }
}

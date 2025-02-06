<?php

namespace App\Http\Controllers;

use App\Models\Perpustakaan;
use Illuminate\Http\Request;

class PerpustakaanController extends Controller
{
    // Menampilkan daftar perpustakaan
    public function index()
    {
        $perpustakaan = Perpustakaan::all(); // Ambil semua data perpustakaan dari database
        return view('admin.perpustakaan.index', compact('perpustakaan'));
    }
    // Menampilkan form untuk menambah perpustakaan
    public function create()
    {
        return view('admin.perpustakaan.create');
    }

    // Menyimpan data perpustakaan baru
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama_perpustakaan' => 'required|unique:tbl_perpustakaan,nama_perpustakaan',  // Validasi nama perpustakaan unik
            'email' => 'required|email|unique:tbl_perpustakaan,email', // Validasi email unik
        ]);

        // Simpan data ke database
        Perpustakaan::create([
            'nama_perpustakaan' => $request->nama_perpustakaan,
            'nama_pustakawan' => $request->nama_pustakawan,
            'alamat' => $request->alamat,
            'email' => $request->email,
            'website' => $request->website,
            'no_telp' => $request->no_telp,
            'keterangan' => $request->keterangan,
        ]);

        // Redirect ke halaman daftar perpustakaan
        return redirect()->route('perpustakaan.index');
    }

    // Menampilkan detail perpustakaan
    public function show($id)
    {
        $perpustakaan = Perpustakaan::findOrFail($id);
        return view('admin.perpustakaan.show', compact('perpustakaan'));
    }

    // Menampilkan form untuk mengedit perpustakaan
    public function edit($id)
    {
        $perpustakaan = Perpustakaan::findOrFail($id);
        return view('admin.perpustakaan.edit', compact('perpustakaan'));
    }

    // Mengupdate data perpustakaan
    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'nama_perpustakaan' => 'required|unique:tbl_perpustakaan,nama_perpustakaan,' . $id . ',id_perpustakaan', // Validasi untuk update
            'email' => 'required|email|unique:tbl_perpustakaan,email,' . $id . ',id_perpustakaan', // Validasi untuk update
        ]);

        // Cari dan update data perpustakaan
        $perpustakaan = Perpustakaan::findOrFail($id);
        $perpustakaan->update([
            'nama_perpustakaan' => $request->nama_perpustakaan,
            'nama_pustakawan' => $request->nama_pustakawan,
            'alamat' => $request->alamat,
            'email' => $request->email,
            'website' => $request->website,
            'no_telp' => $request->no_telp,
            'keterangan' => $request->keterangan,
        ]);

        // Redirect setelah berhasil
        return redirect()->route('perpustakaan.index');
    }

    // Menghapus data perpustakaan
    public function destroy($id)
    {
        // Cari dan hapus data perpustakaan
        $perpustakaan = Perpustakaan::findOrFail($id);
        $perpustakaan->delete();

        // Redirect setelah berhasil
        return redirect()->route('perpustakaan.index');
    }
}

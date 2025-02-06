<?php

namespace App\Http\Controllers;

use App\Models\JenisAnggota;
use Illuminate\Http\Request;

class JenisAnggotaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jenisAnggota = JenisAnggota::all(); // Ambil semua data
        return view('admin.jenis_anggota.index', compact('jenisAnggota'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.jenis_anggota.create'); // Form tambah data
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'kode_jenis_anggota' => 'required|string|max:20',
            'jenis_anggota'      => 'required|string|max:15',
            'max_pinjam'         => 'required|string|max:5',
            'keterangan'         => 'nullable|string|max:50',
        ]);

        JenisAnggota::create($validated);
        return redirect()->route('jenis_anggota.index')->with('success', 'Data berhasil ditambahkan!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $jenisAnggota = JenisAnggota::findOrFail($id); // Cari data berdasarkan ID
        return view('admin.jenis_anggota.edit', compact('jenisAnggota'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'kode_jenis_anggota' => 'required|string|max:20',
            'jenis_anggota'      => 'required|string|max:15',
            'max_pinjam'         => 'required|string|max:5',
            'keterangan'         => 'nullable|string|max:50',
        ]);

        $jenisAnggota = JenisAnggota::findOrFail($id);
        $jenisAnggota->update($validated);
        return redirect()->route('jenis_anggota.index')->with('success', 'Data berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $jenisAnggota = JenisAnggota::findOrFail($id);
        $jenisAnggota->delete();
        return redirect()->route('jenis_anggota.index')->with('success', 'Data berhasil dihapus!');
    }
}

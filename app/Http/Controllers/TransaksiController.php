<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\Pustaka;
use App\Models\Anggota;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transaksis = Transaksi::with('pustaka', 'anggota')->get();
        return view('admin.transaksi.index', compact('transaksis'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pustakas = Pustaka::all(); // Get all pustaka
        $anggotas = Anggota::all(); // Get all anggota
        return view('admin.transaksi.create', compact('pustakas', 'anggotas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_pustaka' => 'required|exists:tbl_pustaka,id_pustaka',
            'id_anggota' => 'required|exists:tbl_anggota,id_anggota',
            'tgl_pinjam' => 'required|date',
            'tgl_kembali' => 'required|date|after_or_equal:tgl_pinjam',
            'tgl_pengembalian' => 'nullable|date',
            'fp' => 'required|in:0,1',
            'keterangan' => 'nullable|string|max:50',
        ]);

        Transaksi::create($request->all());

        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Transaksi $transaksi)
    {
        return view('admin.transaksi.show', compact('transaksi'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaksi $transaksi)
    {
        $pustakas = Pustaka::all(); // Get all pustaka
        $anggotas = Anggota::all(); // Get all anggota
        return view('admin.transaksi.edit', compact('transaksi', 'pustakas', 'anggotas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Transaksi $transaksi)
    {
        $request->validate([
            'id_pustaka' => 'required|exists:tbl_pustaka,id_pustaka',
            'id_anggota' => 'required|exists:tbl_anggota,id_anggota',
            'tgl_pinjam' => 'required|date',
            'tgl_kembali' => 'required|date|after_or_equal:tgl_pinjam',
            'tgl_pengembalian' => 'nullable|date',
            'fp' => 'required|in:0,1',
            'keterangan' => 'nullable|string|max:50',
        ]);

        $transaksi->update($request->all());

        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaksi $transaksi)
    {
        $transaksi->delete();
        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil dihapus!');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Ddc;
use App\Models\Rak;
use Illuminate\Http\Request;

class DdcController extends Controller
{
    // Menampilkan semua data DDC
    public function index()
    {
        $ddc = Ddc::with('rak')->get();
        return view('admin.ddc.index', compact('ddc'));
    }

    // Menampilkan form untuk menambah DDC
    public function create()
    {
        $rak = Rak::all(); // Ambil semua rak untuk pilihan dropdown
        return view('admin.ddc.create', compact('rak'));
    }

    // Menyimpan data DDC baru
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'id_rak' => 'required|exists:tbl_rak,id_rak',
            'kode_ddc' => 'required|unique:tbl_ddc,kode_ddc|max:10',
            'ddc' => 'required|max:100',
            'keterangan' => 'nullable|max:50',
        ]);

        // Menyimpan data DDC ke database
        Ddc::create($request->all());

        // Redirect setelah berhasil menyimpan
        return redirect()->route('ddc.index')->with('success', 'DDC berhasil ditambahkan');
    }

    // Menampilkan form untuk mengedit data DDC
    public function edit($id)
    {
        $ddc = Ddc::findOrFail($id);
        $rak = Rak::all();
        return view('admin.ddc.edit', compact('ddc', 'rak'));
    }

    // Mengupdate data DDC
    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'id_rak' => 'required|exists:tbl_rak,id_rak',
            'kode_ddc' => 'required|unique:tbl_ddc,kode_ddc,' . $id . ',id_ddc|max:10',
            'ddc' => 'required|max:100',
            'keterangan' => 'nullable|max:50',
        ]);

        $ddc = Ddc::findOrFail($id);
        $ddc->update($request->all());

        // Redirect setelah berhasil mengupdate
        return redirect()->route('ddc.index')->with('success', 'DDC berhasil diperbarui');
    }

    // Menghapus data DDC
    public function destroy($id)
    {
        $ddc = Ddc::findOrFail($id);
        $ddc->delete();

        // Redirect setelah berhasil menghapus
        return redirect()->route('ddc.index')->with('success', 'DDC berhasil dihapus');
    }
}

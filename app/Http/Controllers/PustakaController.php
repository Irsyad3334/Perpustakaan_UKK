<?php

namespace App\Http\Controllers;

use App\Models\Pustaka;
use App\Models\DDC;
use App\Models\Format;
use App\Models\Penerbit;
use App\Models\Pengarang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PustakaController extends Controller
{
    /**
     * Menampilkan semua pustaka
     */
    public function index()
    {
        $pustakas = Pustaka::with(['ddc', 'format', 'penerbit', 'pengarang'])->get();
        return view('admin.pustaka.index', compact('pustakas'));
    }

    /**
     * Menampilkan form untuk menambah pustaka
     */
    public function create()
    {
        $ddcs = DDC::all(); // Mengambil semua data DDC
        $formats = Format::all(); // Mengambil semua data Format
        $penerbits = Penerbit::all(); // Mengambil semua data Penerbit
        $pengarangs = Pengarang::all(); // Mengambil semua data Pengarang

        return view('admin.pustaka.create', compact('formats', 'ddcs', 'penerbits', 'pengarangs'));
    }

    /**
     * Menyimpan pustaka baru
     */
    public function store(Request $request)
    {
        $request->validate([
            'kode_pustaka' => 'required|integer',
            'id_ddc' => 'required|exists:tbl_ddc,id_ddc',
            'id_format' => 'required|exists:tbl_format,id_format',
            'id_penerbit' => 'required|exists:tbl_penerbit,id_penerbit',
            'id_pengarang' => 'required|exists:tbl_pengarang,id_pengarang',
            'judul_pustaka' => 'required|string|max:100',
            'tahun_terbit' => 'required|string|max:5',
            'gambar' => 'nullable|image',
            'isbn' => 'nullable|string|max:20',
            'keyword' => 'nullable|string|max:50',
            'keterangan_fisik' => 'nullable|string|max:100',
            'keterangan_tambahan' => 'nullable|string|max:100',
            'abstraksi' => 'nullable|string',
            'harga_buku' => 'nullable|integer',
            'kondisi_buku' => 'nullable|string|max:15',
            'fp' => 'required|in:0,1',
            'jml_pinjam' => 'nullable|integer|max:32767', // Add max value validation
            'denda_terlambat' => 'nullable|integer',
            'denda_hilang' => 'nullable|integer',
        ]);

        // Membuat pustaka baru dan menyimpan ke database
        $pustaka = new Pustaka();
        $pustaka->kode_pustaka = $request->kode_pustaka;
        $pustaka->id_ddc = $request->id_ddc;
        $pustaka->id_format = $request->id_format;
        $pustaka->id_penerbit = $request->id_penerbit;
        $pustaka->id_pengarang = $request->id_pengarang;
        $pustaka->isbn = $request->isbn;
        $pustaka->judul_pustaka = $request->judul_pustaka;
        $pustaka->tahun_terbit = $request->tahun_terbit;
        $pustaka->keyword = $request->keyword;
        $pustaka->keterangan_fisik = $request->keterangan_fisik;
        $pustaka->keterangan_tambahan = $request->keterangan_tambahan;
        $pustaka->abstraksi = $request->abstraksi;
        $pustaka->harga_buku = $request->harga_buku;
        $pustaka->kondisi_buku = $request->kondisi_buku;
        $pustaka->fp = $request->fp;
        $pustaka->jml_pinjam = $request->jml_pinjam;
        $pustaka->denda_terlambat = $request->denda_terlambat;
        $pustaka->denda_hilang = $request->denda_hilang;

        // Menyimpan gambar jika ada
        if ($request->hasFile('gambar')) {
            $imagePath = $request->file('gambar')->store('gambar_pustaka', 'public');
            $pustaka->gambar = $imagePath;
        }

        // Menyimpan data pustaka
        $pustaka->save();

        return redirect()->route('pustaka.index')->with('success', 'Pustaka berhasil ditambahkan');
    }

    /**
     * Menampilkan form untuk mengedit pustaka
     */
    public function edit($id)
    {
        $pustaka = Pustaka::findOrFail($id);
        $ddcs = DDC::all(); 
        $formats = Format::all(); 
        $penerbits = Penerbit::all();
        $pengarangs = Pengarang::all();

        return view('admin.pustaka.edit', compact('pustaka', 'ddcs', 'formats', 'penerbits', 'pengarangs'));
    }

    /**
     * Mengupdate pustaka
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'kode_pustaka' => 'required|integer',
            'id_ddc' => 'required|exists:tbl_ddc,id_ddc',
            'id_format' => 'required|exists:tbl_format,id_format',
            'id_penerbit' => 'required|exists:tbl_penerbit,id_penerbit',
            'id_pengarang' => 'required|exists:tbl_pengarang,id_pengarang',
            'judul_pustaka' => 'required|string|max:100',
            'tahun_terbit' => 'required|string|max:5',
            'gambar' => 'nullable|image',
            'isbn' => 'nullable|string|max:20',
            'keyword' => 'nullable|string|max:50',
            'keterangan_fisik' => 'nullable|string|max:100',
            'keterangan_tambahan' => 'nullable|string|max:100',
            'abstraksi' => 'nullable|string',
            'harga_buku' => 'nullable|integer',
            'kondisi_buku' => 'nullable|string|max:15',
            'fp' => 'required|in:0,1',
            'jml_pinjam' => 'nullable|integer|max:32767', // Add max value validation
            'denda_terlambat' => 'nullable|integer',
            'denda_hilang' => 'nullable|integer',
        ]);

        $pustaka = Pustaka::findOrFail($id);
        $pustaka->kode_pustaka = $request->kode_pustaka;
        $pustaka->id_ddc = $request->id_ddc;
        $pustaka->id_format = $request->id_format;
        $pustaka->id_penerbit = $request->id_penerbit;
        $pustaka->id_pengarang = $request->id_pengarang;
        $pustaka->isbn = $request->isbn;
        $pustaka->judul_pustaka = $request->judul_pustaka;
        $pustaka->tahun_terbit = $request->tahun_terbit;
        $pustaka->keyword = $request->keyword;
        $pustaka->keterangan_fisik = $request->keterangan_fisik;
        $pustaka->keterangan_tambahan = $request->keterangan_tambahan;
        $pustaka->abstraksi = $request->abstraksi;
        $pustaka->harga_buku = $request->harga_buku;
        $pustaka->kondisi_buku = $request->kondisi_buku;
        $pustaka->fp = $request->fp;
        $pustaka->jml_pinjam = $request->jml_pinjam;
        $pustaka->denda_terlambat = $request->denda_terlambat;
        $pustaka->denda_hilang = $request->denda_hilang;

        // Update gambar jika ada
        if ($request->hasFile('gambar')) {
            // Delete old image if exists
            if ($pustaka->gambar) {
                Storage::disk('public')->delete($pustaka->gambar);
            }
            $imagePath = $request->file('gambar')->store('gambar_pustaka', 'public');
            $pustaka->gambar = $imagePath;
        }

        // Menyimpan data pustaka yang telah diperbarui
        $pustaka->save();

        return redirect()->route('pustaka.index')->with('success', 'Pustaka berhasil diperbarui');
    }

    /**
     * Menghapus pustaka
     */
    public function destroy($id)
    {
        $pustaka = Pustaka::findOrFail($id);
        $pustaka->delete();

        return redirect()->route('pustaka.index')->with('success', 'Pustaka berhasil dihapus');
    }

    public function show($id)
    {
        $pustaka = Pustaka::findOrFail($id);
        return view('admin.pustaka.show', compact('pustaka'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\JenisAnggota;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AnggotaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $anggota = Anggota::with('jenisAnggota')->get(); // Mengambil semua data anggota dengan relasi jenis anggota
        return view('admin.anggota.index', compact('anggota'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $jenisAnggota = JenisAnggota::all(); // Ambil semua jenis anggota
        return view('admin.anggota.create', compact('jenisAnggota'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       
        $validated = $request->validate([
            'id_jenis_anggota' => 'required|exists:tbl_jenis_anggota,id_jenis_anggota',
            'kode_anggota' => 'required|string|max:20|unique:tbl_anggota,kode_anggota',
            'nama_anggota' => 'required|string|max:50|unique:tbl_anggota,nama_anggota',
            'tempat' => 'required|string|max:20',
            'tgl_lahir' => 'required|date',
            'alamat' => 'required|string|max:50',
            'no_telp' => 'required|string|max:15',
            'email' => 'nullable|email|max:30|unique:tbl_anggota,email',
            'tgl_daftar' => 'required|date',
            'masa_aktif' => 'required|date',
            'fa' => 'required|in:Y,T',
            'keterangan' => 'nullable|string|max:45',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:10240',
            'username' => 'required|string|max:50|unique:tbl_anggota,username',
            'password' => 'required|string|min:8',
        ]);
       
        // Handle foto upload
        if ($request->hasFile('foto')) {
            $validated['foto'] = $request->file('foto')->store('images/anggota', 'public');
        }

        // Encrypt password
        $validated['password'] = Hash::make($validated['password']);

        Anggota::create($validated);
        return redirect()->route('anggota.index')->with('success', 'Anggota berhasil ditambahkan!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $anggota = Anggota::findOrFail($id);
        $jenisAnggota = JenisAnggota::all();
        return view('admin.anggota.edit', compact('anggota', 'jenisAnggota'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'id_jenis_anggota' => 'required|exists:tbl_jenis_anggota,id_jenis_anggota',
            'kode_anggota' => 'required|string|max:20|unique:tbl_anggota,kode_anggota,' . $id . ',id_anggota',
            'nama_anggota' => 'required|string|max:50|unique:tbl_anggota,nama_anggota,' . $id . ',id_anggota',
            'tempat' => 'required|string|max:20',
            'tgl_lahir' => 'required|date',
            'alamat' => 'required|string|max:50',
            'no_telp' => 'required|string|max:15',
            'email' => 'nullable|email|max:30|unique:tbl_anggota,email,' . $id . ',id_anggota',
            'tgl_daftar' => 'required|date',
            'masa_aktif' => 'required|date',
            'fa' => 'required|in:Y,T',
            'keterangan' => 'nullable|string|max:45',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:10240',
            'username' => 'required|string|max:50|unique:tbl_anggota,username,' . $id . ',id_anggota',
            'password' => 'nullable|string|min:8',
        ]);
  
        // Handle foto upload
        if ($request->hasFile('foto')) {
            $validated['foto'] = $request->file('foto')->store('images/anggota', 'public');
        }

        // Encrypt password if exists
        if ($request->filled('password')) {
            $validated['password'] = Hash::make($validated['password']);
        }

        $anggota = Anggota::findOrFail($id);
        $anggota->update($validated);

        return redirect()->route('anggota.index')->with('success', 'Data anggota berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $anggota = Anggota::findOrFail($id);
        $anggota->delete();
        return redirect()->route('anggota.index')->with('success', 'Data anggota berhasil dihapus!');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\JenisAnggota;
use Illuminate\Http\Request;

class UserJenisAnggotaController extends Controller
{
    public function index()
    {
        $jenisAnggota = JenisAnggota::all();
        return view('user.jenis_anggota.index', compact('jenisAnggota'));
    }
}

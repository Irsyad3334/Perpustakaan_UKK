<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use Illuminate\Http\Request;

class UserAnggotaController extends Controller
{
    public function index()
    {
        $anggota = Anggota::all();
        return view('user.anggota.index', compact('anggota'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;

class UserTransaksiController extends Controller
{
    public function index()
    {
        $transaksis = Transaksi::all();
        return view('user.transaksi.index', compact('transaksis'));
    }
}

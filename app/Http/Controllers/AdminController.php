<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function ddc()
    {
        return view('admin.ddc');
    }

    public function format()
    {
        return view('admin.format');
    }

    public function pengarang()
    {
        return view('admin.pengarang');
    }

    public function pustaka()
    {
        return view('admin.pustaka');
    }

    public function jenisAnggota()
    {
        return view('admin.jenis_anggota');
    }

    public function anggota()
    {
        return view('admin.anggota');
    }
}
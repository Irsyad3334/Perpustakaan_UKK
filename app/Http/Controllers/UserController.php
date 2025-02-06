<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function dashboard()
    {
        return view('profil.dashboard');
    }

    public function pustaka()
    {
        return view('profil.pustaka');
    }

    public function showDashboard()
    {
        return view('user.dashboard'); // Mengembalikan view 'user.dashboard'
    }

    public function index()
    {
        return view('user.perpustakaan.index'); // Merujuk ke view 'user.perpustakaan.index'
    }

    // Add more user functions as needed
}

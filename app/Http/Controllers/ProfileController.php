<?php

// app/Http/Controllers/ProfileController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function dashboard()
    {
        return view('profil.dashboard'); // Pastikan Anda sudah memiliki view ini di resources/views/profil/dashboard.blade.php
    }
}

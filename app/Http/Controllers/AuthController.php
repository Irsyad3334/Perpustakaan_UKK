<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Logout user and redirect to welcome page.
     */
    public function logout(Request $request)
    {
        // Logout user
        Auth::logout();

        // Redirect ke halaman welcome setelah logout
        return redirect()->route('welcome');
    }
}

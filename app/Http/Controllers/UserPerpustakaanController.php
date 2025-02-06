<?php
namespace App\Http\Controllers;

use App\Models\Perpustakaan;
use Illuminate\Http\Request;

class UserPerpustakaanController extends Controller
{
    public function index()
    {
        $perpustakaan = Perpustakaan::all();
        return view('user.perpustakaan.index', compact('perpustakaan'));
    }
}

<?php
namespace App\Http\Controllers;

use App\Models\Pengarang;
use Illuminate\Http\Request;

class UserPengarangController extends Controller
{
    public function index()
    {
        $pengarang = Pengarang::all();
        return view('user.pengarang.index', compact('pengarang'));
    }
}

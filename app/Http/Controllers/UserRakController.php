<?php

namespace App\Http\Controllers;

use App\Models\Rak;
use Illuminate\Http\Request;

class UserRakController extends Controller
{
    public function index()
    {
        $raks = Rak::all();
        return view('user.rak.index', compact('raks'));
    }
}

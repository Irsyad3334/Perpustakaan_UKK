<?php

namespace App\Http\Controllers;

use App\Models\Penerbit;
use Illuminate\Http\Request;

class UserPenerbitController extends Controller
{
    public function index()
    {
        $penerbit = Penerbit::all();
        return view('user.penerbit.index', compact('penerbit'));
    }
}

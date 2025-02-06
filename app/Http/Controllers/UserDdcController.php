<?php

namespace App\Http\Controllers;

use App\Models\Ddc;
use Illuminate\Http\Request;

class UserDdcController extends Controller
{
    public function index()
    {
        $ddc = Ddc::all();
        return view('user.ddc.index', compact('ddc'));
    }
}

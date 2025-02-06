<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Format;

class UserFormatController extends Controller
{
    public function index()
    {
        $formats = Format::all();
        return view('user.format.index', compact('formats'));
    }
}

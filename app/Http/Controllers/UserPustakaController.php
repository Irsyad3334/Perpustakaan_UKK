<?php
namespace App\Http\Controllers;

use App\Models\Pustaka;
use Illuminate\Http\Request;

class UserPustakaController extends Controller
{
    public function index()
    {
        $pustakas = Pustaka::all();
        return view('user.pustaka.index', compact('pustakas'));
    }

    public function show($id)
    {
        $pustaka = Pustaka::findOrFail($id);
        return view('user.pustaka.show', compact('pustaka'));
    }
}

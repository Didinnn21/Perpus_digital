<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DaftarBukuController extends Controller
{
    public function index()
    {
        return view('daftar_buku');
    }
}

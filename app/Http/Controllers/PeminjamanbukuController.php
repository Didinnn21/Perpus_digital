<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PeminjamanbukuController extends Controller
{
   public function index()
    {
        return view('peminjamanbuku.index');
    }
}

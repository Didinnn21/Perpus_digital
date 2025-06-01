<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DaftarbukuController extends Controller
{
     public function index()
    {
        return view('daftarbuku.index');
    }
}

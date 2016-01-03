<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class BelanjaController extends Controller
{
    
    public function belanja_buat()
    {
        return view('admin.belanja_buat');
    }
    public function belanja_daftar()
    {
        return view('admin.belanja_daftar');
    }
}

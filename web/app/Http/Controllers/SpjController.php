<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class SpjController extends Controller
{
    //Halaman SPJ
    public function spj_buat()
    {
        return view('spj.spjup_buat');
    }
    public function spj_detail()
    {
        return view('spj.spjup_detail');
    }
}

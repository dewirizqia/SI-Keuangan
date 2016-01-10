<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//model
use App\Kegiatan;
use App\Output;
use App\Sub_Output;
use App\Input;
use App\Sub_Input;
use App\Akun;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class BelanjaController extends Controller
{
    
    public function belanja_buat()
    {
    	$output = Output::latest()->get();
    	$suboutput = Sub_Output::latest()->get();
        $input = Input::latest()->get();
        $subinput = Sub_Input::latest()->get();
        $akun = Akun::latest()->get();
        return view('belanja.belanja_buat', compact('output', 'suboutput','input', 'subinput', 'akun'));
    }
    public function belanja_daftar()
    {
        return view('belanja.belanja_daftar');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\SPJ_LS;
use App\Daftar_Nominatif;

class SpjController extends Controller
{
//Halaman SPJ
    public function spjup_buat()
    {
        return view('spj.spjup_buat');
    }
    public function spjup_edit()
    {
        return view('spj.spjup_edit');
    }
    public function spjup_daftar()
    {
        return view('spj.spjup_daftar');
    }
    public function spjup_detail()
    {
        return view('spj.spjup_detail');
    }
    public function spjup_edit2()
    {
        return view('spj.spjup_edit2');
    }
//Halaman SPJ LS dan Daftar Nominatif
    public function spjls_buat()
    {
        return view('spj.spjls_buat');
    }
    public function spjls_edit()
    {
        return view('spj.spjls_edit');
    }
    public function spjls_daftar()
    {
        $no = "1";
        $daftar_spjls = SPJ_LS::latest()->get();
        return view('spj.spjls_daftar', compact('no', 'daftar_spjls'));
    }
    public function spjls_detail($id)
    {
        $no = "1";
        $spjls = SPJ_LS::find($id);
        $daftar_nominatif = Daftar_Nominatif::latest()->get();
        // $daftar_nominatif = Daftar_Nominatif::WhereId_ls($id)->get();
        
        return view('spj.spjls_detail', compact('no', 'spjls', 'daftar_nominatif'));
    }
    public function spjls_tambah(Request $request, $id)
    {

        $input = $request->all();
        Daftar_Nominatif::create($input);

        $no = "1";
        $spjls = SPJ_LS::find($id);
        $daftar_nominatif = Daftar_Nominatif::latest()->get();

        return view('spj.spjls_detail', compact('no', 'spjls', 'daftar_nominatif'));
        
    }
    public function nominatif_edit($id)
    {
        $spjls = SPJ_LS::find($id);
        
        
        return view('spj.nominatif_edit', compact('spjls'));
    }
    public function nominatif_buat()
    {
        return view('spj.nominatif_buat');
    }

}

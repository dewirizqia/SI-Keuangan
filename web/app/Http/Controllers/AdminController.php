<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//model
use App\Pagu;
use App\User;
use App\Detail_User;
use App\Usulan;
use App\Detail_Usulan;
use App\Bagian;
use App\Pagu_Bagian;
use App\Pagu_Output;
use App\Rincian_Perhitungan;

use Log;

use App\Http\Requests\PaguRequest;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
        public function __construct()
    {
        $this->middleware('super_admin');
    }
    
    #Prodi/Subbagian
    public function daftar_bagian()
    {
        $no = "1";
        $daftar_bagian = Bagian::orderBy('bagian', 'asc')->get();
        return view('admin.daftar_bagian', compact('daftar_bagian', 'no'));
    }

    public function tambah_bagian(Request $request)
    {
        $input = $request->all();
        $simpan = Bagian::create([
            'bagian' => $input['bagian'],
            'detail' => $input['detail']
            ]);

        return redirect()->route('daftar_bagian');
    }

    public function edit_bagian($id)
    {
        $no = "1";
        $daftar_bagian = Bagian::orderBy('bagian', 'asc')->get();
        $dbagian = Bagian::FindOrFail($id);
        return view('admin.edit_bagian', compact('dbagian','daftar_bagian', 'no'));
    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//model
use App\Pagu;
use App\User;
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
        $this->middleware('auth');
    }


    public function daftar_pagu()
    {
        $no = "1";
        $alokasi = "1";
        $spagu = Pagu::orderBy('tahun', 'desc')->get();

        return view('admin.daftar_pagu', compact('spagu', 'no', 'alokasi'));
    }

        public function buat_pagu()
    {
    
        return view('admin.tambah_pagu');
    }
    public function simpan_pagu(PaguRequest $request)
    {
        $input = $request->all();
        try 
        {
        Pagu::create($input);
        } 
        catch (QueryException $e) {
            return redirect()->route('buat_pagu');
        }
        
        return redirect()->route('daftar_pagu'); 
    }


        



    public function daftar_user()
    {
        $no = "1";
        $suser = User::orderBy('jabatan', 'asc')->get();
        return view('admin.daftar_user', compact('suser', 'no'));
    }
    
    #bagian
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

            public function daftar_pagu_bagian()
    {
        $no = "1";
        $daftar_pagu_bagian = Pagu_Bagian::orderBy('id_pagu', 'dsc')->get();
        return view('admin.daftar_pagu_bagian', compact('daftar_pagu_bagian', 'no'));
    }
            public function daftar_pagu_output()
    {
        $no = "1";
        $daftar_pagu_output = Pagu_Output::orderBy('id_pagu', 'dsc')->get();
        return view('admin.daftar_pagu_output', compact('daftar_pagu_output', 'no'));
    }
}

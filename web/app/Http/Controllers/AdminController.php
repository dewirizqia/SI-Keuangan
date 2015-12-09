<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//model
use App\Pagu;
use App\User;
use App\Output;
use App\Sub_Output;
use App\Input;
use App\Sub_Input;
use App\Akun;
use App\Usulan;
use App\Detail_Usulan;
use App\Bagian;
use App\Pagu_Bagian;
use App\Pagu_Output;
use App\Rincian_Perhitungan;

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


        public function daftar_usulan_bagian($id)
    {
        $no = "1";
        $dftrusulan = Usulan::whereId_bagian($id)->get();
        return view('usulan.daftar_usulan_bagian', compact('id','no', 'dftrusulan'));
    }

        public function detail_usulan($id)
    {
        $no = "1";
        $usulan = Usulan::whereId($id)->get();
        $detail_usulan = Detail_Usulan::whereId_usulan($id)->get();
        return view('usulan.detail_usulan', compact('id','no', 'usulan', 'detail_usulan'));
    }



            public function buat_usulan_bagian($bagian)
    {
        
        return view('usulan.buat_usulan_bagian', compact('bagian'));
    }

    public function daftar_user()
    {
        $no = "1";
        $suser = User::orderBy('jabatan', 'asc')->get();
        return view('admin.daftar_user', compact('suser', 'no'));
    }
    public function daftar_output()
    {
        $no = "1";
        $soutput = Output::orderBy('kode_output', 'asc')->get();
        return view('admin.daftar_output', compact('soutput', 'no'));
    }
    public function daftar_suboutput()
    {
        $no = "1";
        $ssuboutput = Sub_Output::orderBy('kode_suboutput', 'asc')->get();
        return view('admin.daftar_suboutput', compact('ssuboutput', 'no'));
    }

    public function daftar_input()
    {
        $no = "1";
        $sinput = Input::orderBy('kode_input', 'asc')->get();
        return view('admin.daftar_input', compact('sinput', 'no'));
    }
    public function daftar_subinput()
    {
        $no = "1";
        $ssubinput = Sub_Input::orderBy('kode_subinput', 'asc')->get();
        return view('admin.daftar_subinput', compact('ssubinput', 'no'));
    }

        public function daftar_akun()
    {
        $no = "1";
        $sakun = Akun::orderBy('id', 'asc')->get();
        return view('admin.daftar_akun', compact('sakun', 'no'));
    }

            public function daftar_bagian()
    {
        $no = "1";
        $daftar_bagian = Bagian::orderBy('bagian', 'asc')->get();
        return view('admin.daftar_bagian', compact('daftar_bagian', 'no'));
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

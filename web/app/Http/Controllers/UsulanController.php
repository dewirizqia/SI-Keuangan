<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

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


class UsulanController extends Controller
{
 
        public function __construct()
    {
        $this->middleware('auth');
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
        $no_suboutput = 0;
        $no_input = 0;
        $no_akun = 0;
        $no_subinput = 0;
        $output = Output::latest()->get();
        
        
        $databagian = Bagian::whereId($bagian)->firstOrFail();
        
        $suboutput = Sub_Output::latest()->get();
        $input = Input::latest()->get();
        $subinput = Sub_Input::latest()->get();
        $akun = Akun::orderBy('id', 'asc')->get();

        return view('usulan.buat_usulan_bagian', compact('output','databagian', 'suboutput','input', 'subinput', 'akun', 'no_suboutput', 'no_input', 'no_subinput', 'no_akun'));
    }

    public function buat_detail(Request $request, $bagian)
    {   
        $id_subkomp = $request->input('sub_input');
        $id_akun = $request->input('akun');
        $tahun = $request->input('tahun');
        return redirect()->route('buat_detail_usulan_bagian', compact('bagian','tahun', 'id_subkomp', 'id_akun'));
    }

        public function buat_detail_usulan_bagian($bagian, $tahun, $subkom, $akun)
    {
        return $tahun;
        // return view('usulan.buat_detail_usulan_bagian', compact());
    }


}

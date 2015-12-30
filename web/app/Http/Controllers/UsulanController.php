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


    public function daftar_usulan_bagian($id_bagian)
    {
        $no = "1";
        $dftrusulan = Usulan::whereId_bagian($id_bagian)->get();
        return view('usulan.daftar_usulan_bagian', compact('id_bagian','no', 'dftrusulan'));
    }
    public function tambah_usulan_bagian(Request $request, $id_bagian)
    {
        $input = $request->all();
        $simpan = Usulan::create([
            'tahun' => $input['tahun'],
            'revisi' => '0',
            'status' => 'sementara',
            'id_bagian' => $id_bagian,
            ]);

        return redirect()->route('daftar_usulan_bagian', compact('id'));
    }

        public function detail_usulan($id)
    {
        $no = "1";
        $usulan = Usulan::whereId($id)->get();
        $detail_usulan = Detail_Usulan::whereId_usulan($id)->get();
        return view('usulan.detail_usulan', compact('id','no', 'usulan', 'detail_usulan'));
    }

        public function buat_usulan_bagian($id_usulan)
    {
        $no_suboutput = 0;
        $no_input = 0;
        $no_akun = 0;
        $no_subinput = 0;
        $output = Output::latest()->get();
        $usulan = Usulan::whereId($id_usulan)->firstOrFail();
        $detail = Detail_Usulan::whereId_usulan($usulan->id)->get();
        $id_bagian = $usulan->id_bagian;
        $databagian = Bagian::whereId($id_bagian)->firstOrFail();
        $suboutput = Sub_Output::latest()->get();
        $input = Input::latest()->get();
        $subinput = Sub_Input::latest()->get();
        $akun = Akun::orderBy('id', 'asc')->get();
        return view('usulan.buat_usulan_bagian', compact('detail','usulan','output','databagian', 'suboutput','input', 'subinput', 'akun', 'no_suboutput', 'no_input', 'no_subinput', 'no_akun'));
    }

    public function nilai_detail(Request $request, $usulan)
    {   
        $id_subkomp = $request->input('sub_input');
        $id_akun = $request->input('akun');
        $usulan = Usulan::whereId($usulan)->firstOrFail();
        $tahun = $usulan->tahun;
        $id_bagian = $usulan->id_bagian;
        return redirect()->route('buat_detail_usulan_bagian', compact('id_bagian','tahun', 'id_subkomp', 'id_akun'));
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
        // return $tahun;
        // $output = Output::latest()->get();
        // $suboutput = Sub_Output::latest()->get();
        // $d_input = Input::latest()->get();
        $usulan = Usulan::whereTahun($tahun)->firstOrFail();
        $detail = Detail_Usulan::whereId_usulan($usulan->id)->get();
        $d_subinput = Sub_Input::whereId($subkom)->firstOrFail();
        $d_akun = Akun::whereId($akun)->firstOrFail();
        return view('usulan.buat_detail_usulan_bagian', compact('bagian','tahun', 'id_subkomp', 'id_akun', 'd_subinput', 'd_akun', 'detail', 'usulan'));
    }

    public function usulan_bagian_simpan(Request $request)
    {
        $input = $request->all();
        $bagian = 1;
        $simpan = Usulan::create([
            'tahun' => $input['tahun'],
            'revisi' => '0',
            'status' => 'sementara',
            'id_bagian' => $bagian,
            ]);
        return redirect()->route('buat_detail_usulan_bagian');
    }

    public function detail_usulan_bagian_simpan(Request $request, $bagian, $tahun, $subkom, $akun)
    {
        $input = $request->all();
        $usulan = Usulan::whereTahun($tahun)->firstOrFail();
        $simpan = Detail_Usulan::create([
            'id_usulan' => $usulan->id,
            'jumlah_rincian' => $input['jumlah_rincian'],
            'detail' => $input['detail'],
            'harga_satuan' => $input['harga_satuan'],
            'jumlah' => $input['jumlah'],
            'jenis_komponen' => $input['jenis_komponen'],
            'id_subinput' => $subkom,
            'id_akun' => $akun,
            ]);
        $simpan_rincian = Rincian_Perhitungan::insert([
            ['id_detail_usulan' => $simpan->id, 'nominal' => $input['nom1'], 'satuan' => $input['sat1']],
            ['id_detail_usulan' => $simpan->id, 'nominal' => $input['nom2'], 'satuan' => $input['sat2']],
            ['id_detail_usulan' => $simpan->id, 'nominal' => $input['nom3'], 'satuan' => $input['sat3']],
            ['id_detail_usulan' => $simpan->id, 'nominal' => $input['nom4'], 'satuan' => $input['sat4']]            
        ]);
        // return $id_usulan;
        // dd($simpan_rincian);
        return redirect()->route('buat_detail_usulan_bagian', compact('bagian', 'tahun', 'subkom', 'akun'));
    }


}

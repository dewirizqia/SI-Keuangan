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
use App\Rkakl;
use App\Detail_Usulan;
use App\Detail_Rkakl;
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

    public function daftar_usulan()
    {
        $no = "1";
        $dftrusulan = Usulan::latest()->get();
        return view('usulan.daftar_usulan', compact('no','dftrusulan'));
    }

    public function daftar_usulan_bagian($id_bagian)
    {
        $no = "1";
        $dftrusulan = Usulan::whereId_bagian($id_bagian)->get();
        $bagian = Bagian::whereId($id_bagian)->get();
        return view('usulan.daftar_usulan_bagian', compact('bagian','id_bagian','no', 'dftrusulan'));
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

        return redirect()->route('daftar_usulan_bagian', compact('id_bagian'));
    }
    public function delete_usulan_bagian($id)
    {
        $dftrusulan = Usulan::whereId($id);
        $dftrusulan->delete();
        $id_bagian = $dftrusulan->id_bagian;
        return redirect()->route('daftar_usulan_bagian');
    }

        public function detail_usulan($id)
    {
        $no = "1";
        $usulan = Usulan::whereId($id)->get();
        $detail_usulan = Detail_Usulan::whereId_usulan($id)->get();
        return view('usulan.detail_usulan', compact('id','no', 'usulan', 'detail_usulan'));
    }

        public function buat_usulan_bagian($id)
    {
        $no_suboutput = 0;
        $no_input = 0;
        $no_akun = 0;
        $no_subinput = 0;
        $output = Output::latest()->get();
        $usulan = Usulan::whereId($id)->firstOrFail();
        $id_usulan = $usulan->id;
        $detail = Detail_Usulan::whereId_usulan($id_usulan)->get();
        // $id_bagian = $usulan->id_bagian;
        // $databagian = Bagian::whereId($id_bagian)->firstOrFail();
        $suboutput = Sub_Output::latest()->get();
        $input = Input::latest()->get();
        $subinput = Sub_Input::latest()->get();
        $akun = Akun::latest()->get();
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
            'nominal' => $input['nominal'],
            'satuan' => $input['satuan'],
            'detail' => $input['detail'],
            'harga_satuan' => $input['harga_satuan'],
            'jumlah' => $input['jumlah'],
            'jenis_komponen' => $input['jenis_komponen'],
            'id_subinput' => $subkom,
            'id_akun' => $akun,
            ]);
        // return $id_usulan;
        // dd($simpan_rincian);
        return redirect()->route('buat_detail_usulan_bagian', compact('bagian', 'tahun', 'subkom', 'akun'));
    }


    //UBAH STATUS USULAN
    //usulan
    public function status_usulan($id)
    {
        $usulan = Usulan::whereId($id)->firstOrFail();
        $usulan->status = 'usulan';
        $usulan->save();
        return redirect()->route('daftar_usulan');
    }

    //RKAKL
    public function daftar_rkakl()
    {
        $no = "1";
        $dftr_rkakl = Rkakl::latest()->get();
        $spagu = Pagu::latest()->get();
        return view('usulan.daftar_rkakl', compact('no','dftr_rkakl', 'spagu'));
    }

    public function tambah_rkakl(Request $request)
    {
        $input = $request->all();
        $simpan = Rkakl::create([
            'id_pagu' => $input['id_pagu'],
            'revisi' => '0',
            ]);

        return redirect()->route('daftar_rkakl');
    }

    public function nilai_rkakl(Request $request, $rkakl)
    {   
        $id_subkomp = $request->input('sub_input');
        $id_akun = $request->input('akun');
        $rkakl = Rkakl::whereId($rkakl)->firstOrFail();
        $tahun = $rkakl->pagu->tahun;
        return redirect()->route('buat_detail_rkakl', compact('tahun', 'id_subkomp', 'id_akun'));
    }

        public function buat_rkakl($id)
    {
        $no_suboutput = 0;
        $no_input = 0;
        $no_akun = 0;
        $no_subinput = 0;
        $output = Output::latest()->get();
        $rkakl = Rkakl::whereId($id)->firstOrFail();
        $id_rkakl = $rkakl->id;
        $detail = Detail_Rkakl::whereId_rkakl($id_rkakl)->get();
        $suboutput = Sub_Output::latest()->get();
        $input = Input::latest()->get();
        $subinput = Sub_Input::latest()->get();
        $akun = Akun::latest()->get();
        return view('usulan.buat_rkakl', compact('detail','rkakl','output','databagian', 'suboutput','input', 'subinput', 'akun', 'no_suboutput', 'no_input', 'no_subinput', 'no_akun'));
    }

    public function buat_detail_rkakl($tahun, $subkom, $akun)
    {
        $pagu = Pagu::whereTahun($tahun)->firstOrFail();
        $id_pagu = $pagu->id;
        $rkakl = Rkakl::whereId_pagu($id_pagu)->firstOrFail();
        $id_rkakl = $rkakl->id;
        $detail = Detail_Rkakl::whereId_rkakl($id_rkakl)->get();
        $total = Detail_Rkakl::whereId_rkakl($id_rkakl)->sum('jumlah_biaya');
        $d_subinput = Sub_Input::whereId($subkom)->firstOrFail();
        $d_akun = Akun::whereId($akun)->firstOrFail();
        // return $total;
        return view('usulan.buat_detail_rkakl', compact('tahun', 'id_subkomp', 'id_akun', 'd_subinput', 'd_akun', 'detail', 'rkakl', 'total'));
    }

    public function detail_rkakl_simpan(Request $request, $tahun, $subkom, $akun)
    {
        $input = $request->all();
        $pagu = Pagu::whereTahun($tahun)->firstOrFail();
        $id_pagu = $pagu->id;
        $rkakl = Rkakl::whereId_pagu($id_pagu)->firstOrFail();
        ['id_rkakl', 'id_akun', 'id_subinput', 'detail', 
        'volume', 'satuan', 'harga_satuan', 'jumlah_biaya'];
        $simpan = Detail_Rkakl::create([
            'id_rkakl' => $rkakl->id,
            'id_akun' => $akun,
            'id_subinput' => $subkom,
            'detail' => $input['detail'],
            'volume' => $input['volume'],
            'satuan' => $input['satuan'],
            'harga_satuan' => $input['harga_satuan'],
            'jumlah_biaya' => $input['jumlah_biaya'],
            
            
            ]);
        // return $id_usulan;
        // dd($simpan_rincian);
        return redirect()->route('buat_detail_rkakl', compact('bagian', 'tahun', 'subkom', 'akun'));
    }


}

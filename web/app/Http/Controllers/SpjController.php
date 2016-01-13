<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Bagian;
use App\Kegiatan;
use App\Output;
use App\Sub_Output;
use App\Input;
use App\Sub_Input;
use App\Akun;
use App\SPJ_UP;
use App\SPJ_UP_Detail;
use App\SPJ_LS;
use App\Daftar_Nominatif;


class SpjController extends Controller
{
//Halaman SPJ
    public function spjup_buat()
    {
        $soutput = Output::orderBy('kode_output', 'asc')->get();
        $ssuboutput = Sub_Output::orderBy('kode_suboutput', 'asc')->get();
        $sinput = Input::orderBy('kode_input', 'asc')->get();
        $ssubinput = Sub_Input::orderBy('kode_subinput', 'asc')->get();
        $akun = Akun::orderBy('kode_akun', 'asc')->get();
        $bagian = Bagian::orderBy('id', 'dsc')->get();

        return view('spj.spjup_buat', compact('soutput','ssuboutput','sinput','ssubinput', 'akun', 'bagian'));
    }

    public function spjup_simpan(Request $request)
    {
        $input = $request->all();

        try {
            SPJ_UP::create($input);
        } 
        catch (QueryException $e) {
            return redirect()->route('spjup_buat');
        }
            
        return redirect()->route('spjup_daftar');
    }

    public function spjup_edit($id)
    {
        $spjup = SPJ_UP::find($id);
        $soutput = Output::orderBy('kode_output', 'asc')->get();
        $ssuboutput = Sub_Output::orderBy('kode_suboutput', 'asc')->get();
        $sinput = Input::orderBy('kode_input', 'asc')->get();
        $ssubinput = Sub_Input::orderBy('kode_subinput', 'asc')->get();
        $akun = Akun::orderBy('kode_akun', 'asc')->get();
        $bagian = Bagian::orderBy('id', 'dsc')->get();

        return view('spj.spjup_edit', compact('spjup', 'soutput','ssuboutput','sinput','ssubinput', 'akun', 'bagian'));
    }

    public function spjup_update(Request $request, $id)
    {
        $spjup = SPJ_UP::FindOrFail($id);
        $input = $request->all();
        
        try 
        {
            $spjup->update($input);
        } 
        catch (QueryException $e) {
            return redirect()->back();
        }
        
        return redirect()->route('spjup_daftar');
    }

    public function spjup_daftar()
    {
        $no = "1";
        $daftar_spjup = SPJ_UP::latest()->get();
        return view('spj.spjup_daftar', compact('no', 'daftar_spjup'));
    }

    public function spjup_delete($id)
    {
        $spjup = SPJ_UP::FindOrFail($id);
        $spjup->delete();
        
        return redirect()->route('spjup_daftar');
    }
    
    public function spjup_detail($id)
    {
        $no = "1";
        $spjup = SPJ_UP::FindOrFail($id);
        $daftar_detail = SPJ_UP_Detail::whereId_spj($id)->get();
        return view('spj.spjup_detail', compact('no', 'spjup', 'daftar_detail'));
    }

    public function spjup_detail_simpan(Request $request, $id)
    {
        $input = $request->all();
        $input['terima_kotor'] = $request['jumlah_jam'] * $request['satuan'];
        $input['pajak'] = $input['terima_kotor'] * ($request['pajak']/100);
        $input['terima_bersih'] = $input['terima_kotor'] - $input['pajak'];
        
        try {
            SPJ_UP_Detail::create($input);
        } 
        catch (QueryException $e) {
            return redirect()->route('spjup_detail');
        }
        
        $no = "1";    
        $spjup = SPJ_UP::FindOrFail($id);
        $daftar_detail = SPJ_UP_Detail::whereId_spj($id)->get();
        return view('spj.spjup_detail', compact('no','spjup', 'daftar_detail'));
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

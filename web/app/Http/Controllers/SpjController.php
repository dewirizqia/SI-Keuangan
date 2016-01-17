<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\UpRequest;
use App\Http\Requests\UpDetailRequest;
use App\Http\Requests\LsRequest;
use App\Http\Requests\LsDetailRequest;
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
use App\SPJ_LS_Detail;
use App\Daftar_Nominatif;
use App\Komentar;


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

    public function spjup_simpan(UpRequest $request)
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

    public function spjup_update(UpRequest $request, $id)
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
        $daftar_detail = SPJ_UP_Detail::whereId_spj($id)->latest()->get();
        
        $total = SPJ_UP_Detail::whereId_spj($id)->sum('terima_bersih');
        $spjup->total = $total;
        $spjup->save();
        
        return view('spj.spjup_detail', compact('no', 'spjup', 'daftar_detail'));
    }

    public function spjup_detail_simpan(UpDetailRequest $request)
    {
        $input = $request->all();
        $input['terima_kotor'] = $request['volume'] * $request['satuan'];
        $input['pajak'] = $input['terima_kotor'] * ($request['pajak']/100);
        $input['terima_bersih'] = $input['terima_kotor'] - $input['pajak'];
        $id = $request['id_spj'];

        try {
            SPJ_UP_Detail::create($input);
        } 
        catch (QueryException $e) {
            return redirect()->route('spjup_detail');
        }
        
        return redirect()->route('spjup_detail', compact('id'));
    }

    public function spjup_detail_edit($id)
    {
        $detail = SPJ_UP_Detail::FindOrFail($id);
        $pajak = $detail->pajak / $detail->terima_kotor * 100;   
        return view('spj.spjup_edit2', compact('detail', 'pajak'));
    }

    public function spjup_detail_update(UpDetailRequest $request, $id)
    {
        $detail = SPJ_UP_Detail::FindOrFail($id);
        $input = $request->all();
        $input['terima_kotor'] = $request['volume'] * $request['satuan'];
        $input['pajak'] = $input['terima_kotor'] * ($request['pajak']/100);
        $input['terima_bersih'] = $input['terima_kotor'] - $input['pajak'];

        try 
        {
            $detail->update($input);
        } 
        catch (QueryException $e) {
            return redirect()->back();
        }

        $id = $detail->spj_up->id;       
        return redirect()->route('spjup_detail', compact('id'));
    }

    public function spjup_detail_delete($id)
    {
        $detail = SPJ_UP_Detail::FindOrFail($id);
        
        $id = $detail->spj_up->id;
        
        $detail->delete();
        // return $id;
        return redirect()->route('spjup_detail', compact('id'));
    }

    public function spjup_komentar($id)
    {
        $spjup = SPJ_UP::FindOrFail($id);
        $daftar_komentar = Komentar::whereJenis('UP')->whereId_jenis($id)->latest()->get();
        return view('spj.spjup_komentar', compact('spjup', 'daftar_komentar'));
    }

    public function spjup_komentar_simpan(Request $request)
    {
        $input = $request->all();
        $id = $request['id_jenis'];        

        try {
            Komentar::create($input);
        } 
        catch (QueryException $e) {
            return redirect()->route('spjup_komentar');
        }
        
        return redirect()->route('spjup_komentar', compact('id'));
    }

//Halaman SPJ LS
    public function spjls_daftar()
    {
        $no = "1";
        $daftar_spjls = SPJ_LS::latest()->get();
        return view('spj.spjls_daftar', compact('no', 'daftar_spjls'));
    }

    public function spjls_buat()
    {
        $soutput = Output::orderBy('kode_output', 'asc')->get();
        $ssuboutput = Sub_Output::orderBy('kode_suboutput', 'asc')->get();
        $sinput = Input::orderBy('kode_input', 'asc')->get();
        $ssubinput = Sub_Input::orderBy('kode_subinput', 'asc')->get();
        $akun = Akun::orderBy('kode_akun', 'asc')->get();
        $bagian = Bagian::orderBy('id', 'dsc')->get();
        
        return view('spj.spjls_buat', compact('soutput','ssuboutput','sinput','ssubinput', 'akun', 'bagian'));
    }

    public function spjls_simpan(LsRequest $request)
    {
        $qoutput = Output::FindOrFail($request['output']);
        $qsuboutput = Sub_Output::FindOrFail($request['id_suboutput']);
        $qinput = Input::FindOrFail($request['id_input']);
        $qsubinput = Sub_Input::FindOrFail($request['id_subinput']);
        
        $input = $request->all();
        $input['kode_anggaran'] = $qoutput->kode_output. '.' .$qsuboutput->kode_suboutput. '.' .$qinput->kode_input.$qsubinput->kode_subinput;
        $input['no_sk'] = $request['nomor']. '/UN8.1.31/KU/' .$request['tahun'];
        

        try {
            SPJ_LS::create($input);
        } 
        catch (QueryException $e) {
            return redirect()->route('spjup_buat');
        }
            
        return redirect()->route('spjls_daftar');
    }

    public function spjls_edit($id)
    {
        $soutput = Output::orderBy('kode_output', 'asc')->get();
        $ssuboutput = Sub_Output::orderBy('kode_suboutput', 'asc')->get();
        $sinput = Input::orderBy('kode_input', 'asc')->get();
        $ssubinput = Sub_Input::orderBy('kode_subinput', 'asc')->get();
        $akun = Akun::orderBy('kode_akun', 'asc')->get();
        $bagian = Bagian::orderBy('id', 'dsc')->get();
        $spjls = SPJ_LS::FindOrFail($id);

        return view('spj.spjls_edit', compact('soutput','ssuboutput','sinput','ssubinput', 'akun', 'bagian', 'spjls'));
        
    }

    public function spjls_update(LsRequest $request, $id)
    {
        $spjls = SPJ_LS::FindOrFail($id);
        $qoutput = Output::FindOrFail($request['output']);
        $qsuboutput = Sub_Output::FindOrFail($request['id_suboutput']);
        $qinput = Input::FindOrFail($request['id_input']);
        $qsubinput = Sub_Input::FindOrFail($request['id_subinput']);
        $qakun = Akun::FindOrFail($request['id_akun']);

        $input = $request->all();
        $input['kode_anggaran'] = $qoutput->kode_output. '.' .$qsuboutput->kode_suboutput. '.' .$qinput->kode_input.$qsubinput->kode_subinput;
        $input['no_sk'] = $request['nomor']. '/UN8.1.31/KU/' .$request['tahun'];
        
        try 
        {
            $spjls->update($input);
        } 
        catch (QueryException $e) {
            return redirect()->back();
        }
        
        return redirect()->route('spjls_daftar');
    }

    public function spjls_delete($id)
    {
        $spjls = SPJ_LS::FindOrFail($id);
        $spjls->delete();
        
        return redirect()->route('spjls_daftar');
    }
    
    public function spjls_detail($id)
    {
        $no = "1";
        $spjls = SPJ_LS::FindOrFail($id);        
        $daftar_detail = SPJ_LS_Detail::whereId_ls($id)->latest()->get();
        $jumlah_penerima = count($daftar_detail);
        $jumlah_kotor = SPJ_LS_Detail::whereId_ls($id)->sum('terima');
        $total_pph = SPJ_LS_Detail::whereId_ls($id)->sum('pph');
        $jumlah_bersih = SPJ_LS_Detail::whereId_ls($id)->sum('terima_bersih');
        
        $spjls->jmlh_penerima = $jumlah_penerima;
        $spjls->jmlh_kotor = $jumlah_kotor;
        $spjls->pph = $total_pph;
        $spjls->jmlh_bersih = $jumlah_bersih; 
        $spjls->save();
        
        return view('spj.spjls_detail', compact('no', 'spjls', 'daftar_detail', 'jumlah_penerima', 'jumlah_kotor', 'total_pph', 'jumlah_bersih'));
    }

    public function spjls_detail_simpan(LsDetailRequest $request)
    {
        $input = $request->all();
        $input['terima'] = $request['jlh_hari'] * $request['satuan'];
        $input['pph'] = $input['terima'] * ($request['pph']/100);
        $input['terima_bersih'] = $input['terima'] - $input['pph'];
                
        try 
        {
            SPJ_LS_Detail::create($input);
        } 
        catch (QueryException $e) {
            return redirect()->back();
        }


        $id = $request['id_ls'];
        return redirect()->route('spjls_detail', compact('id'));
        
    }
    
    public function spjls_detail_edit($id)
    {
        $detail = SPJ_LS_Detail::FindOrFail($id);
        $pph = $detail->pph / $detail->terima * 100;    
        return view('spj.spjls_edit2', compact('detail', 'pph'));
    }

    public function spjls_detail_update(LsDetailRequest $request, $id)
    {
        $detail = SPJ_LS_Detail::FindOrFail($id);
        $input = $request->all();
        $input['terima'] = $request['jlh_hari'] * $request['satuan'];
        $input['pph'] = $input['terima'] * ($request['pph']/100);
        $input['terima_bersih'] = $input['terima'] - $input['pph'];

        try 
        {
            $detail->update($input);
        } 
        catch (QueryException $e) {
            return redirect()->back();
        }

        $id = $detail->spjls->id;       
        return redirect()->route('spjls_detail', compact('id'));
    }

    public function spjls_detail_delete($id)
    {
        $detail = SPJ_LS_Detail::FindOrFail($id);
        
        $id = $detail->spjls->id;
        
        $detail->delete();
        
        return redirect()->route('spjls_detail', compact('id'));
    }

    public function spjls_komentar($id)
    {
        $spjls = SPJ_LS::FindOrFail($id);
        $daftar_komentar = Komentar::whereJenis('LS')->whereId_jenis($id)->latest()->get();
        return view('spj.spjls_komentar', compact('spjls', 'daftar_komentar'));
    }

    public function spjls_komentar_simpan(Request $request)
    {
        $input = $request->all();
        $id = $request['id_jenis'];        

        try {
            Komentar::create($input);
        } 
        catch (QueryException $e) {
            return redirect()->route('spjls_komentar');
        }
        
        return redirect()->route('spjls_komentar', compact('id'));
    }

    
//Halaman Daftar Nominatif
    public function nominatif_menu()
    {
        $daftar_spjls = SPJ_LS::latest()->get();

        return view('nominatif.nominatif_menu', compact('daftar_spjls'));
    }

    public function nominatif_daftar(Request $request)
    {
        $spjls = SPJ_LS::whereNo_sk($request['sk'])->firstOrfail();
        $id = $spjls->id;
        $daftar_detail = SPJ_LS_Detail::whereId_ls($id)->latest()->get();
        $jumlah_penerima = count($daftar_detail);
        $jumlah_kotor = SPJ_LS_Detail::whereId_ls($id)->sum('terima');
        $total_pph = SPJ_LS_Detail::whereId_ls($id)->sum('pph');
        $jumlah_bersih = SPJ_LS_Detail::whereId_ls($id)->sum('terima_bersih');
        $no = "1";
        
        return view('nominatif.nominatif_daftar', compact('no', 'spjls', 'daftar_detail', 'jumlah_penerima', 'jumlah_kotor', 'total_pph', 'jumlah_bersih'));
    }




}

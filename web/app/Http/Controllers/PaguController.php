<?php

namespace App\Http\Controllers;

//model
use App\Kegiatan;
use App\Output;
use App\Bagian;
use App\Sub_Output;
use App\Input;
use App\Sub_Input;
use App\Akun;
use App\Pagu;
use App\Pagu_Kegiatan;
use App\Pagu_Output;
use App\Pagu_Bagian;
use Auth;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class PaguController extends Controller
{
    public function daftar_pagu()
    {
        $no = "1";
        $alokasi = "1";
        $spagu = Pagu::orderBy('tahun', 'desc')->get();
        $user = Auth::user(); 
        foreach( $user->detail_user as $detail){
            $jabatan = $detail->jabatan;
        }
        return view('pagu.daftar_pagu', compact('jabatan','user','spagu', 'no', 'alokasi'));
    }

        public function edit_pagu($id)
    {
        $pagu = Pagu::FindOrFail($id);   
        return view('pagu.edit_pagu', compact('pagu'));
    }
    public function simpan_pagu(PaguRequest $request)
    {
        $input = $request->all();
        try 
        {
        Pagu::create($input);
        } 
        catch (QueryException $e) {
            return redirect()->route('daftar_pagu');
        }
        
        return redirect()->route('daftar_pagu'); 
    }

            public function daftar_pagu_bagian()
    {
        $no = "1";
        $daftar_pagu_bagian = Pagu_Bagian::orderBy('id_pagu', 'dsc')->get();
        $sbagian = Bagian::orderBy('id', 'dsc')->get();
        $daftar_pagu = Pagu::latest()->get();
        return view('pagu.daftar_pagu_bagian', compact('daftar_pagu','sbagian','daftar_pagu_bagian', 'no'));
    }


            public function daftar_pagu_output()
    {
        $no = "1";
        $daftar_pagu_output = Pagu_Output::orderBy('id_pagu', 'dsc')->get();
        return view('pagu.daftar_pagu_output', compact('daftar_pagu_output', 'no'));
    }

            public function daftar_pagu_kegiatan()
    {
        $no = "1";
        $ssuboutput = Sub_Output::orderBy('kode_suboutput', 'asc')->get();
        $sinput = Input::orderBy('kode_input', 'asc')->get();
        $ssubinput = Sub_Input::orderBy('kode_subinput', 'asc')->get();
        $daftar_pagu = Pagu::orderBy('id', 'dsc')->get();
        $daftar_pagu_output = Pagu_Output::orderBy('id', 'dsc')->get();
        $daftar_pagu_kegiatan = Pagu_Kegiatan::orderBy('id', 'dsc')->get();
        return view('pagu.daftar_pagu_kegiatan', compact('daftar_pagu','ssuboutput','daftar_pagu_output','sinput','ssubinput', 'no', 'daftar_pagu_kegiatan'));
    }
   

}

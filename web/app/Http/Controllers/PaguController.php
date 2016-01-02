<?php

namespace App\Http\Controllers;

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

        return view('pagu.daftar_pagu', compact('spagu', 'no', 'alokasi'));
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
        return view('pagu.daftar_pagu_bagian', compact('daftar_pagu_bagian', 'no'));
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
        $soutput = Output::orderBy('kode_output', 'asc')->get();
        $ssuboutput = Sub_Output::orderBy('kode_suboutput', 'asc')->get();
        $sinput = Input::orderBy('kode_input', 'asc')->get();
        $ssubinput = Sub_Input::orderBy('kode_subinput', 'asc')->get();
        $daftar_pagu_output = Pagu_Output::orderBy('id_pagu', 'dsc')->get();
        return view('pagu.daftar_pagu_output', compact('daftar_pagu_output', 'no'));
    }
   

}

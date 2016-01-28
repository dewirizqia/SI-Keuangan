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
use App\Rkakl;
use App\Detail_Rkakl;
use App\Pagu_Kegiatan;
use App\Pagu_Output;
use App\Pagu_Bagian;
use Auth;
use Illuminate\Http\Request;

//request
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\PaguRequest;
use App\Http\Requests\PaguKegiatanRequest;
use App\Http\Requests\PaguBagianRequest;

class PaguController extends Controller
{
    public function __construct()
    {
        $this->middleware('keuangan');
    }

    public function pw_keuangan($id){
        // $user = User::whereId($id)->firstOrFail();
        return "tes";
        return view('admin.pw_keuangan', compact('user'));
    }

    public function daftar_pagu()
    {
        $no = "1";
        $alokasi = "1";
        $spagu = Pagu::orderBy('tahun', 'desc')->get();
        $tahun = date("Y");
        // foreach ($spagu as $pagu) {
        //     $id_pagu = $pagu->id;
        //     $rkakl = Rkakl::whereId_pagu($id_pagu)->get();
        //     $id_rkakl = $rkakl->id;
        //     $total = Detail_Rkakl::whereId_rkakl($id_rkakl)->sum('jumlah');
        // }
        // return $spagu;
        // return $tahun;
        
        // return view('tes', compact('spagu', 'total'));
        return view('pagu.daftar_pagu', compact('tahun','user','spagu', 'no', 'alokasi'));
    }

    public function simpan_pagu(PaguRequest $request)
    {
        $input = $request->all();
        $tahun = $request->input('tahun');
        $pagu = Pagu::whereTahun($tahun)->get();
        if ($pagu->count()){
            return redirect()->back()
            ->with('pesan', 'Data Pagu Sudah ada!');
        }
        $input['sisa'] = $request->input('batasan');
        Pagu::create($input);
        return redirect()->route('daftar_pagu'); 
    }

        public function edit_pagu($id)
    {
        $pagu = Pagu::FindOrFail($id);   
        return view('pagu.edit_pagu', compact('pagu'));
    }

    public function update_pagu(Request $request, $id)
    {
        $this->validate($request, [
        'batasan' => 'required|numeric',
        ]);
        $pagu = Pagu::FindOrFail($id);
        $input = $request->all();
        $batasan = $request->input('batasan');
        $batasan_awal = $pagu->batasan;
        if($batasan < $batasan_awal){
            $pagu->sisa = $batasan;
        }
        $pagu->batasan = $batasan;
        $pagu->save();
        return redirect()->route('daftar_pagu');
    }
    public function delete_pagu($id)
    {
        
        $pagu = Pagu::FindOrFail($id);
        $pagu->delete();
        return redirect()->route('daftar_pagu');
    }
//////////////////////////////////////////PAGU BAGIAN/////////////////////////////////////////
            public function daftar_pagu_bagian()
    {
        $no = "1";
        $daftar_pagu_bagian = Pagu_Bagian::orderBy('id_pagu', 'dsc')->get();
        $sbagian = Bagian::orderBy('id', 'dsc')->get();
        $daftar_pagu = Pagu::latest()->get();
        return view('pagu.daftar_pagu_bagian', compact('daftar_pagu','sbagian','daftar_pagu_bagian', 'no'));
    }
       public function detail_pagu_bagian($id)
    {
        $no = 1;
        $pagu = Pagu_Bagian::FindOrFail($id);
        $bagian = $pagu->ke_bagian->detail;
        $tahun = $pagu->ke_pagu->tahun;
        $jpagu = $pagu->pagu;
        $alokasi = $pagu->jumlah;
        $sisa = $pagu->sisa;
        $daftar_pagu_bagian = Pagu_Bagian::latest()->get();
        return view('pagu.detail_pagu_bagian', compact('no','daftar_pagu_bagian','sisa','alokasi','jpagu','tahun','bagian','pagu'));
    }

        public function simpan_pagu_bagian(PaguBagianRequest $request)
    {
        $input = $request->all();
        $id_pagu = $request->input('id_pagu');
        $pagu = Pagu::FindOrFail($id_pagu);
        $batasan_pagu = $pagu->batasan;
        $id_bagian = $request->input('id_bagian');
        $bagian = Bagian::FindOrFail($id_bagian);
        $pagu_bagian = Pagu_Bagian::whereId_bagian($id_bagian)->whereId_pagu($id_pagu)->get();
        if ($pagu_bagian->count()){
            return redirect()->back()
            ->with('pesan', 'Data Pagu Prodi/Bagian Sudah ada!');
        }
        $jumlah = $request->input('jumlah');
        $total_pagu_bagian = Pagu_Bagian::whereId_pagu($id_pagu)->sum('jumlah');
        $total_pagu_bagian = $total_pagu_bagian + $jumlah;
        if($total_pagu_bagian > $batasan_pagu){
            return redirect()->back()
            ->with('pesan', 'Total Alokasi Pagu Bagian melebihi Alokasi Pagu RKAKL!');
        }

        Pagu_Bagian::create($input);
        return redirect()->route('daftar_pagu_bagian'); 
    }

        public function edit_pagu_bagian($id)
    {
        $pagu_bagian = Pagu_Bagian::FindOrFail($id);   
        $sbagian = Bagian::orderBy('id', 'dsc')->get();
        $daftar_pagu = Pagu::latest()->get();
        return view('pagu.edit_pagu_bagian', compact('pagu_bagian','sbagian','daftar_pagu'));
    }

    // public function update_pagu(Request $request, $id)
    // {
    //     $this->validate($request, [
    //     'batasan' => 'required|numeric',
    //     ]);
    //     $pagu = Pagu::FindOrFail($id);
    //     $input = $request->all();
    //     $batasan = $request->input('batasan');
    //     $pagu->batasan = $batasan;
    //     $pagu->save();
    //     return redirect()->route('daftar_pagu');
    // }


//////////////////////////////////////////PAGU OUTPUT/////////////////////////////////////////
       public function detail_pagu_output($id)
    {
        $no = 1;
        $pagu = Pagu_Output::FindOrFail($id);
        $output = $pagu->ke_output->uraian;
        $tahun = $pagu->ke_pagu->tahun;
        $jpagu = $pagu->pagu;
        $alokasi = $pagu->jumlah;
        $sisa = $pagu->sisa;
        $daftar_pagu_output = Pagu_Output::latest()->get();
        return view('pagu.detail_pagu_output', compact('no','daftar_pagu_output','sisa','alokasi','jpagu','tahun','output','pagu'));
    }


            public function daftar_pagu_output()
    {
        $no = "1";
        $daftar_pagu_output = Pagu_Output::orderBy('id_pagu', 'dsc')->get();
        return view('pagu.daftar_pagu_output', compact('daftar_pagu_output', 'no'));
    }

//////////////////////////////////////////PAGU KEGIATAN/////////////////////////////////////////

            public function daftar_pagu_kegiatan()
    {
        $no = "1";
        $ssuboutput = Sub_Output::orderBy('kode_suboutput', 'asc')->get();
        $sinput = Input::orderBy('kode_input', 'asc')->get();
        $ssubinput = Sub_Input::orderBy('kode_subinput', 'asc')->get();
        $daftar_pagu = Pagu::orderBy('id', 'dsc')->get();
        // $daftar_pagu_output = Pagu_Output::orderBy('id', 'dsc')->get();
        $daftar_pagu_kegiatan = Pagu_Kegiatan::orderBy('id', 'dsc')->get();
        $sakun = Akun::latest()->get();
        return view('pagu.daftar_pagu_kegiatan', compact('daftar_pagu','ssuboutput','daftar_pagu_output','sinput','ssubinput', 'no', 'daftar_pagu_kegiatan', 'sakun'));
    }

    public function simpan_pagu_kegiatan(PaguKegiatanRequest $request)
    {
        $input = $request->all();
        // dd($input);
        try 
        {
        Pagu_Kegiatan::create($input);
        } 
        catch (QueryException $e) {
            return redirect()->route('daftar_pagu_kegiatan');
        }
        
        return redirect()->route('daftar_pagu_kegiatan'); 
    

}

}
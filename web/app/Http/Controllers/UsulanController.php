<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\DetailUsulanRequest;
use App\Http\Requests\UsulanRequest;
use App\Http\Controllers\Controller;
use Auth;
use Mail;
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
use App\Detail_User;
use App\Detail_Rkakl;
use App\Bagian;
use App\Pagu_Bagian;
use App\Pagu_Output;
use App\Rincian_Perhitungan;



class UsulanController extends Controller
{
 
        public function __construct()
    {
        $this->middleware('keuangan', ['except' =>[
            'buat_detail_usulan_bagian',
            'detail_usulan_bagian_simpan',
            'usulan_bagian_simpan',
            'buat_usulan_detail',
            'daftar_usulan_bagian',
            'simpanusulandetail',
            'deleteusulandetail',
            'delete_usulan_bagian',
            'buat_usulan_bagian',
            'tambah_usulan_detail',
            'nilai_detail',
            'buat_detail',
            'tambahsubinput',
            'simpansubinput',
            'deletesubinput'
            ]]);
    }


    public function ubahpassword_keuangan($id){
        // $user = User::whereId($id)->firstOrFail();
        return "tes";
        return view('admin.pw_keuangan', compact('user'));
    }
    public function update_password_keuangan(UbahPasswordRequest $request)
    {
        $user = Auth::user();
        $input = $request->all();

        $password_lama = $request->input('password_lama');

        if (!Hash::check($password_lama, $user->password))
        {
            return redirect()->route('ubahpassword')->with('error', 'Password lama yang anda masukkan salah.');
        }

        if ($request->input('password') == '')
        {
            $input['password'] = $user->password;
        }
        else
        {
            $input['password'] = bcrypt($request->input('password'));
        }

        try 
        {
        $user->update($input);
        } 
        catch (QueryException $e) {
            return redirect()->route('ubah_password_user')->with('pesan', 'Username yang anda masukkan sudah ada dalam database.');
        }

        return redirect()->route('dashboard')->with('pesan', 'Password telah berhasil di ubah');
        
    }
    public function daftar_usulan()
    {
        $no = "1";
        $dftrusulan = Usulan::whereStatus('usulan')->get();
        $daftar_pagu = Pagu::latest()->get();
        return view('usulan.daftar_usulan', compact('daftar_pagu','no','dftrusulan'));
    }

    public function daftar_usulan_bagian($id_bagian)
    {
        $no = "1";
        $dftrusulan = Usulan::whereId_bagian($id_bagian)->get();
        $bagian = Bagian::whereId($id_bagian)->get();
        $daftar_pagu = Pagu::latest()->get();
        // return $id_bagian;
        return view('usulan.daftar_usulan_bagian', compact('daftar_pagu','bagian','id_bagian','no', 'dftrusulan'));
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


         public function buat_usulan_detail($id)
    {
        $prodi = Auth::user()->id;
        $sub_input = Sub_Input::whereId($id)->firstOrFail();
        $usulan = Detail_Usulan::whereId_subinput($id)->whereProdi($prodi)->orderBy('id_akun','asc')->get();
        $akun = Akun::orderBy('id','asc')->get();
        $lama = "";
        $baru = "";
        $total =0;
        $totals=0;   
   
        return view('usulan.usulan_tambah_uraian',compact('usulan','sub_input','akun','lama','baru','total','totals'));
    }

         public function tambah_usulan_detail($id)
    {
        $id_subinput = $id;
        $akun = Akun::orderBy('kode_akun','asc')->get();
        $total = 0;
        return view('usulan.usulan_tambah_detail',compact('akun','id_subinput','total'));
    }

      public function simpanusulandetail(Request $request)
    {
        $input = $request->all();
        $input['jenis_komponen'] = "utama";

        $nominal = $input['nominal'];
        $harga = $input['harga_satuan'];

        $total = $harga*$nominal;

        $input['jumlah'] = $total;
       
        Detail_Usulan::create($input);
  
        return redirect()->back();
    }


    public function deleteusulandetail($id)
    {
        $usulan = Detail_Usulan::whereId($id)->firstOrFail();
        $usulan->delete();

        return redirect()->back();
    }


        public function buat_usulan_bagian($id)
    {
        $tahun = $id;
         $output = Output::orderBy('kode_output','asc')->get();
        $sub_output = Sub_output::orderBy('kode_suboutput','asc')->get();
        $input = Input::orderBy('kode_input','asc')->get();
        $sub_input = Sub_Input::orderBy('kode_subinput','asc')->get();
        $prodi = Auth::user()->id;

        return view('usulan.usulan_tambah',compact('output','sub_output','input','sub_input','tahun','prodi'));
//        $no = 0;
  //      $no_suboutput = 0;
    //    $no_input = 0;
      //  $no_akun = 0;
//        $no_subinput = 0;
  //      $output = Output::latest()->get();
    //    $usulan = Usulan::whereId($id)->firstOrFail();
      //  $id_usulan = $usulan->id;
//        $detail = Detail_Usulan::whereId_usulan($id_usulan)->get();
  //      $id_bagian = $usulan->id_bagian;
        // $databagian = Bagian::whereId($id_bagian)->firstOrFail();
//        $suboutput = Sub_Output::latest()->get();
  //      $input = Input::latest()->get();
    //    $subinput = Sub_Input::latest()->get();
      //  $akun = Akun::latest()->get();
        // return $id_bagian;
       // return view('usulan.buat_usulan_bagian', compact('id_bagian', 'no','detail','usulan','output','databagian', 'suboutput','input', 'subinput', 'akun', 'no_suboutput', 'no_input', 'no_subinput', 'no_akun'));
    }

         public function tambahsubinput($id)
    {
        $id = $id;


        return view('usulan.usulan_tambah_subinput',compact('id'));
    }


      public function simpansubinput(Request $request)
    {
        $input = $request->all();
        

        Sub_Input::create($input);
  
        return redirect()->back();
    }

    public function deletesubinput($id)
    {
        $subinput = Sub_Input::whereId($id)->firstOrFail();
       
        $subinput->delete();

        return redirect()->back();
    }


    public function nilai_detail(Request $request, $id)
    {   
        $id_subkomp = $request->input('sub_input');
        $id_akun = $request->input('akun');
        $usulan = Usulan::whereId($id)->firstOrFail();
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
        $no = 0;
        $usulan = Usulan::whereTahun($tahun)->whereId_bagian($bagian)->firstOrFail();
        $detail = Detail_Usulan::whereId_usulan($usulan->id)->get();
        $d_subinput = Sub_Input::whereId($subkom)->firstOrFail();
        $d_akun = Akun::whereId($akun)->firstOrFail();
        $total = Detail_Usulan::whereId_usulan($usulan->id)->sum('jumlah');
        

        return view('usulan.buat_detail_usulan_bagian', compact('total','no','bagian','tahun', 'id_subkomp', 'id_akun', 'd_subinput', 'd_akun', 'detail', 'usulan'));
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
        $usulan = Usulan::whereTahun($tahun)->whereId_bagian($bagian)->firstOrFail();
        $id_usulan = $usulan->id;
        $input['id_usulan'] = $usulan->id;
        $input['id_subinput'] = $subkom;
        $input['id_akun'] = $akun;
        Detail_Usulan::create($input);
        // try 
        // {
        // Detail_Usulan::create($input);
        // } 
        // catch (QueryException $e) {
        // return redirect()->route('buat_detail_usulan_bagian', compact('bagian', 'tahun', 'subkom', 'akun'));
        // }
        // return $id_usulan;
        // dd($simpan_rincian);
        return redirect()->route('buat_detail_usulan_bagian', compact('bagian', 'tahun', 'subkom', 'akun'));
    }


    public function detail_usulan_tahun($tahun)
    {
        $no = 1;
        $daftar_usulan = Usulan::whereTahun($tahun)->whereStatus('usulan')->with('detail_usulan')->get();
        foreach ($daftar_usulan as $usulan) {
            $id_usulan = $usulan->id;
            $total_rab = Detail_Usulan::whereId_usulan($id_usulan)->sum('jumlah');
            
        }
        
        return view('usulan.detail_usulan_tahun', compact('no','daftar_usulan', 'total_rab','tahun'));
    }

    public function detail_usulan_edit($id)
{
    $detail_usulan = Detail_Usulan::FindOrFail($id);
    return view('usulan.edit_detail_usulan', compact('detail_usulan'));
}
    public function detail_usulan_update(DetailUsulanRequest $request, $id)
{
    $detail_usulan = Detail_Usulan::FindOrFail($id);
    $tahun = $detail_usulan->usulan->tahun;
    $input = $request->all();
    $detail_usulan->update($input);
    return redirect()->route('detail_usulan_tahun', compact('tahun'));
    
}
    public function detail_usulan_delete($id)
{
    $detail_usulan = Detail_Usulan::FindOrFail($id);
    $tahun = $detail_usulan->usulan->tahun;
    $detail_usulan->delete();
    return redirect()->route('detail_usulan_tahun', compact('tahun'));
}


    //////////////////////////////////////////UBAH STATUS USULAN////////////////////////////////////////////
    
    public function status_usulan_wddekan($id)
    {
        $usulan = Usulan::FindOrFail($id);
        $usulan->status = 'WD II/Dekan';
        $usulan->save;
        $id_bagian = $usulan->id_bagian;
        $detail_bagian = User::whereId_bagian($id_bagian)->with('detail_user')->get();
        Mail::send('emails.status_usulan_wddekan', function($message) use ($detail_bagian)
            {
                foreach ($detail_bagian as $user_bagian) {
                $email = $user_bagian->ke_user->email;
                $message->to($email)->from('19dewi@gmail.com', 'dewi')
                ->subject('Usulan');
                }    
            });
        return redirect()->back();
    }

    //////////////////////////////////////RKAKL///////////////////////////////////////////////////
    public function daftar_rkakl()
    {
        $no = "1";
        $dftr_rkakl = Rkakl::latest()->get();
        $spagu = Pagu::latest()->get();
        return view('usulan.daftar_rkakl', compact('no','dftr_rkakl', 'spagu'));
    }

    public function tambah_rkakl(Request $request)
    {
        $this->validate($request, [
        'tahun' => 'required',
        ]);
        $input = $request->all();
        $id_pagu = $request->input('tahun');
        $rkakl = Rkakl::whereId_pagu($id_pagu)->get();
        $pagu = Pagu::whereId($id_pagu)->firstOrFail();
        $tahun = $pagu->tahun;
        $usulan = Usulan::whereTahun($tahun)->whereStatus('disetujui');
        if ($usulan->count()){
            if ($rkakl->count()){
                return redirect()->back()
                ->with('pesan', 'Data RKA-KL Sudah ada!');
            }
            $input['revisi'] = '0';
            $input['id_pagu'] = $id_pagu;
            Rkakl::create($input);
            return redirect()->route('daftar_rkakl');    
        }
        
        return redirect()->back()
            ->with('pesan', 'Data Usulan belum disetujui!');
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
        $id_pagu = $rkakl->id_pagu;
        $pagu = Pagu::whereId($id_pagu)->firstOrFail();
        $tahun = $pagu->tahun;
        $id_rkakl = $rkakl->id;
        $detail = Detail_Rkakl::whereId_rkakl($id_rkakl)->get();
        $suboutput = Sub_Output::latest()->get();
        $input = Input::latest()->get();
        $subinput = Sub_Input::latest()->get();
        $akun = Akun::latest()->get();
        $total = Detail_Rkakl::whereId_rkakl($id_rkakl)->sum('jumlah_biaya');
        $daftar_usulan = Usulan::whereTahun($tahun)->whereStatus('usulan')->with('detail_usulan')->get();
        foreach ($daftar_usulan as $usulan) {
            $id_usulan = $usulan->id;
            $total_rab = Detail_Usulan::whereId_usulan($id_usulan)->sum('jumlah');
            
        }
        return view('usulan.buat_rkakl', compact('total_rab','tahun','total','detail','rkakl','output','databagian', 'suboutput','input', 'subinput', 'akun', 'no_suboutput', 'no_input', 'no_subinput', 'no_akun', 'usulan', 'daftar_usulan'));
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
        // $pagu->alokasi = $total;
        // $pagu->save();
        // return $total;
        return view('usulan.buat_detail_rkakl', compact('tahun', 'id_subkomp', 'id_akun', 'd_subinput', 'd_akun', 'detail', 'rkakl', 'total'));
    }

    public function detail_rkakl_simpan(Request $request, $tahun, $subkom, $akun)
    {
        $input = $request->all();
        $pagu = Pagu::whereTahun($tahun)->firstOrFail();
        $id_pagu = $pagu->id;
        $rkakl = Rkakl::whereId_pagu($id_pagu)->firstOrFail();
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

    public function delete_rkakl($id)
    {
        
        $rkakl = Rkakl::FindOrFail($id);
        $rkakl->delete();
        $id_pagu = $rkakl->id_pagu;
        $pagu = Pagu::FindOrFail($id_pagu);
        $pagu->alokasi = "0";
        $pagu->sisa = "0";
        $pagu->save();
        // return "tes";
        return redirect()->route('daftar_rkakl');
    }

    //REVISI
    public function daftar_revisi()
    {
        $no = "1";
        $daftar_revisi = Usulan::whereStatus('revisi')->latest()->get();
        return view('usulan.daftar_revisi', compact('no','daftar_revisi'));
    }
/////////////////////////////////////UBAH STATUS USULAN///////////////////////////////
    public function status_usulan_subbag($id)
    {
        $usulan = Usulan::FindOrFail($id);
        $usulan->status = "subbag";
        $usulan->save();
        // return "subbag";
        $detail_wd2 = Detail_User::whereJabatan('wd2')->get();
        Mail::send('emails.status_usulan_subbag', [],function($message) use ($detail_wd2)
            {
                foreach ($detail_wd2 as $user_wd2) {
                $email = $user_wd2->ke_user->email;
                $message->to($email)->from('19dewi@gmail.com', 'dewi')
                ->subject('Usulan');
                }    
            });
        return redirect()->back();
        
    }

    public function status_usulan_wd($id)
    {
        
    }
//////////////////////////////////STATUS RKA-KL///////////////////////////////////////
    public function rkakl_selesai($id)
    {
        $rkakl = Rkakl::FindOrFail($id);
        $total = Detail_Rkakl::whereId_rkakl($id)->sum('jumlah_biaya');
        $id_pagu = $rkakl->id_pagu;
        $pagu = Pagu::FindOrFail($id_pagu);
        $pagu->alokasi = $total;
        $pagu->sisa = $total;
        $pagu->save();
        return redirect()->route('daftar_rkakl');
    }




}

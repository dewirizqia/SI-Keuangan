<?php

namespace App\Http\Controllers;

//request
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\UsulanRequest;

//model
use App\Usulan;
use App\Bagian;
use App\User;
use App\Detail_User;
use App\Pagu_Bagian;
use App\Pagu;

use Mail;


use App\Http\Controllers\Controller;

class BagianController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function ubahpassword_bagian($id){
        $user = User::whereId($id)->firstOrFail();
        return view('admin.ubahpassword_bagian', compact('user'));
    }
    public function update_password_bagian(UbahPasswordRequest $request)
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

    //USULAN PER BAGIAN
    public function daftar_usulan_perbagian($id_bagian)
    {
        $no = "1";
        $dftrusulan = Usulan::whereId_bagian($id_bagian)->get();
        $bagian = Bagian::whereId($id_bagian)->get();
        return view('usulan.daftar_usulan_perbagian', compact('bagian','id_bagian','no', 'dftrusulan'));
    }
    public function tes(UsulanRequest $request, $id){
        $input = $request->all();
        $tahun = $request->input('tahun');
        $usulan = Usulan::whereTahun($tahun)->whereId_bagian($id)->get();
        if ($usulan->count()){
            return redirect()->back()
            ->with('pesan', 'Data usulan Sudah ada!');
        }
        $input['revisi'] = '0';
        $input['status'] = 'sementara';
        $input['id_bagian'] = $id; 
        Usulan::create($input);
        return redirect()->route('daftar_usulan_perbagian', compact('id'));
    }

    public function tambah_usulan_perbagian(UsulanRequest $request, $id)
    {
        $input = $request->all();
        $tahun = $request->input('tahun');
        $usulan = Usulan::whereTahun($tahun)->whereId_bagian($id)->firstOrFail();
        // Usulan::create($input);
        // $simpan = Usulan::create([
        //     'tahun' => $input['tahun'],
        //     'revisi' => '0',
        //     'status' => 'sementara',
        //     'id_bagian' => $id_bagian,
        //     ]);


        // $usulan = Usulan::whereTahun($tahun)->whereId_bagian($bagian)->firstOrFail();
        // $id_usulan = $usulan->id;
        // $input['id_usulan'] = $usulan->id;
        // $input['id_subinput'] = $subkom;
        // $input['id_akun'] = $akun;
        // Usulan::create($input);
        return $id;
        // return redirect()->route('daftar_usulan_bagian', compact('id_bagian'));
    }
    public function status_usulan($id)
    {
        // $user = User::latest()->get();
        $daftar_user = User::with('detail_user')->get();
        $detail_subbag = Detail_User::whereJabatan('subbag')->get();
        
        $usulan = Usulan::whereId($id)->firstOrFail();
        $usulan->status = 'usulan';
        $usulan->save();
        $tahun = $usulan->tahun;
        $prodi = $usulan->ke_bagian->detail;
            Mail::send('emails.status_usulan', ['tahun'=> $tahun, 'prodi'=> $prodi], function($message) use ($detail_subbag)
            {
                foreach ($detail_subbag as $user_subbag) {
                $email = $user_subbag->ke_user->email;
                $message->to($email)->from('19dewi@gmail.com', 'dewi')
                ->subject('Usulan');
                }    
            });
        return redirect()->route('daftar_usulan_perbagian');
    }

    /////////////////////////////SERAPAN DANA////////////////////////////////////////////
    public function daftar_serapan_bagian($id)
    {
        $no_u = "1";
        $no_r = "1";
        $bagian = Bagian::whereId($id)->firstOrFail();  
        $daftar_pagu_bagian = Pagu_Bagian::whereId_bagian($id)->orderBy('id_pagu', 'dsc')->get(); 
        $tahun = date("Y");
        $cpagu = Pagu::whereTahun($tahun)->firstOrFail();
        // $cpagu_bagian = Pagu_Bagian::whereT->get(); 
        return view('pagu.daftar_serapan_bagian', compact('no_r','no_u', 'bagian', 'daftar_pagu_bagian', 'tahun'));
    }    
    public function daftar_revisi_perbagian($id){
        $no = "1";
        $id_bagian = $id;
        $dftrusulan = Usulan::whereId_bagian($id)->get();
        $dftr_revisi = Usulan::whereId_bagian($id)->where('revisi', '>', '0')->get();
        $bagian = Bagian::whereId($id)->get();
        return view('usulan.daftar_revisi_perbagian', compact('dftr_revisi','bagian','id_bagian','no', 'dftrusulan'));        

    }
}

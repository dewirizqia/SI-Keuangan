<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//model
use App\Pagu;
use App\User;
use App\Detail_User;
use App\Usulan;
use App\Detail_Usulan;
use App\Bagian;
use App\Pagu_Bagian;
use App\Pagu_Output;
use App\Rincian_Perhitungan;

use Log;

use App\Http\Requests\PaguRequest;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
        public function __construct()
    {
        $this->middleware('super_admin');
    }


        public function ubahpassword_admin($id){
        $user = User::whereId($id)->firstOrFail();
        return view('admin.ubahpassword_admin', compact('user'));
    }
    public function update_password_admin(UbahPasswordRequest $request)
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
        
    #Prodi/Subbagian
    public function daftar_bagian()
    {
        $no = "1";
        $daftar_bagian = Bagian::orderBy('bagian', 'asc')->get();
        return view('admin.daftar_bagian', compact('daftar_bagian', 'no'));
    }

    public function tambah_bagian(Request $request)
    {
        $input = $request->all();
        $simpan = Bagian::create([
            'bagian' => $input['bagian'],
            'detail' => $input['detail']
            ]);

        return redirect()->route('daftar_bagian');
    }

    public function edit_bagian($id)
    {
        $no = "1";
        $daftar_bagian = Bagian::orderBy('bagian', 'asc')->get();
        $dbagian = Bagian::FindOrFail($id);
        return view('admin.edit_bagian', compact('dbagian','daftar_bagian', 'no'));
    }

}

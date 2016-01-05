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
        $this->middleware('auth');
    }


    
    // User
    public function daftar_user()
    {
        $no = "1";
        $suser = User::orderBy('id', 'asc')->get();
        return view('admin.daftar_user', compact('suser', 'no'));
    }
    public function buat_user()
    {
        $sbagian = Bagian::orderBy('id', 'asc')->get();
        return view('admin.tambah_user', compact('sbagian'));
    }
    public function simpan_user(Request $request)
    {
        $input = $request->all();
        $input['password'] = bcrypt($request->input('password'));
        try 
        {
        $simpan_user = User::create($input);
        $id_user = $simpan_user->id;
        $input['id_user'] = $id_user;
        Detail_User::create($input);
        } 
        catch (QueryException $e) {
            return redirect()->route('buat_user');
        }
        
        return redirect()->route('daftar_user'); 
    }

    public function edit_user($id)
    {
        $user = User::FindOrFail($id);
        return view('admin.edit_user', compact('user'));
    }

    public function delete_user($id)
    {
        
            $user = User::FindOrFail($id);
            $user->delete();
            
            return redirect()->route('daftar_user');
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

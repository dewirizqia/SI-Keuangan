<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//model
use App\User;
use App\Detail_User;
use App\Bagian;
use App\Role;
//

use App\Http\Requests;
use App\Http\Controllers\Controller;

class UserController extends Controller
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
        return view('user.daftar_user', compact('suser', 'no'));
    }

    public function buat_user()
    {
        $sbagian = Bagian::orderBy('id', 'asc')->get();
        $roles = Role::oldest()->get();
        return view('user.tambah_user', compact('sbagian', 'roles'));
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
        $input['jabatan'] = $request->input('role');
        Detail_User::create($input);
        $user = User::latest()->firstOrFail();
        $role = Role::whereName($request->input('role'))->firstOrFail();
        $user->attachRole($role);
        } 
        catch (QueryException $e) {
            return redirect()->route('buat_user');
        }
        
        return redirect()->route('daftar_user'); 
    }

    public function edit_user($id)
    {
        $user = User::FindOrFail($id);
        foreach ($user->roles as $roles) 
        {
            $role_user = $roles;
        }
        
        $sbagian = Bagian::orderBy('id', 'asc')->get();
        $roles = Role::where('name','!=', $role_user->name)->get();
        return view('user.edit_user', compact('user', 'roles', 'role_user','sbagian'));
    }

    public function delete_user($id)
    {
        
            $user = User::FindOrFail($id);
            $user->delete();
            
            return redirect()->route('daftar_user');
    }    
}

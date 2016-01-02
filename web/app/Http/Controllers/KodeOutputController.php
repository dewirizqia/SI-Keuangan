<?php

namespace App\Http\Controllers; 

use Illuminate\Http\Request;

//model
use App\Kegiatan;
use App\Output;
use App\Sub_Output;
use App\Input;
use App\Sub_Input;
use App\Akun;

use App\Http\Requests\KegiatanRequest;
use App\Http\Requests\OutputRequest;
use App\Http\Requests\SubOutputRequest;
use App\Http\Requests\InputRequest;
use App\Http\Requests\SubInputRequest;
use App\Http\Requests\AkunRequest;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class KodeOutputController extends Controller
{
      public function __construct()
    {
        $this->middleware('auth');
    }
#kegiatan
public function daftar_kegiatan()
{
    $no = "1";
    $skegiatan = Kegiatan::orderBy('kode_kegiatan', 'asc')->get();
    return view('admin.daftar_kegiatan', compact('skegiatan', 'no'));
}
public function simpan_kegiatan(KegiatanRequest $request)
{
    $input = $request->all();
    try 
    {
    Kegiatan::create($input);
    } 
    catch (QueryException $e) {
    return redirect()->route('daftar_kegiatan');
    }
        
    return redirect()->route('daftar_kegiatan'); 
    }
public function edit_kegiatan($id)
{
    $no = "1";
    $skegiatan = Kegiatan::FindOrFail($id);
    return view('admin.edit_kegiatan', compact('skegiatan', 'no'));
}
public function update_kegiatan(KegiatanRequest $request, $id)
{
    $skegiatan = Kegiatan::whereId($id)->firstOrFail();
    $input = $request->all();
    try 
    {
    $skegiatan->update($input);
    } 
    catch (QueryException $e) {
        return redirect()->back();
    }
    return redirect()->route('daftar_kegiatan');
}
public function delete_kegiatan($id)
{
    
        $skegiatan = Kegiatan::FindOrFail($id);
        $skegiatan->delete();
        
        return redirect()->route('daftar_kegiatan');
}
#output
public function daftar_output()
{
    $no = "1";
    $soutput = Output::orderBy('kode_output', 'asc')->get();
    return view('admin.daftar_output', compact('soutput', 'no'));
}
public function simpan_output(OutputRequest $request)
{
    $input = $request->all();
    try 
    {
    Output::create($input);
    } 
    catch (QueryException $e) {
    return redirect()->route('daftar_output');
    }
        
    return redirect()->route('daftar_output'); 
    }
public function edit_output($id)
{
    $no = "1";
    $soutput = Output::FindOrFail($id);
    return view('admin.edit_output', compact('soutput', 'no'));
}
public function update_output(OutputRequest $request, $id)
{
    $soutput = Output::whereId($id)->firstOrFail();
    $input = $request->all();
    try 
    {
    $soutput->update($input);
    } 
    catch (QueryException $e) {
        return redirect()->back();
    }
    return redirect()->route('daftar_output');
}
public function delete_output($id)
{
    
        $soutput = Output::FindOrFail($id);
        $soutput->delete();
        
        return redirect()->route('daftar_output');
}
        
#suboutput
public function daftar_suboutput()
    {
        $no = "1";
        $soutput = Output::orderBy('kode_output', 'asc')->get();
        $ssuboutput = Sub_Output::orderBy('kode_suboutput', 'asc')->get();
        return view('admin.daftar_suboutput', compact('soutput','ssuboutput', 'no'));
    }
public function simpan_suboutput(SubOutputRequest $request)
{
    $input = $request->all();

    try 
    {
    Sub_Output::create($input);
    } 
    catch (QueryException $e) {
    return redirect()->route('daftar_suboutput');
    }
        
    return redirect()->route('daftar_suboutput'); 
    }
public function edit_suboutput($id)
{
    $no = "1";
    $ssuboutput = Sub_Output::FindOrFail($id);
    return view('admin.edit_suboutput', compact('ssuboutput', 'no'));
}
public function update_suboutput(SubOutputRequest $request, $id)
{
    $ssuboutput = Sub_Output::whereId($id)->firstOrFail();
    $input = $request->all();
    try 
    {
    $ssuboutput->update($input);
    } 
    catch (QueryException $e) {
        return redirect()->back();
    }
    return redirect()->route('daftar_suboutput');
}
public function delete_suboutput($id)
{
    
        $ssuboutput = Sub_Output::FindOrFail($id);
        $ssuboutput->delete();
        
        return redirect()->route('daftar_suboutput');
}
#input
public function daftar_input()
{
    $no = "1";
    $soutput = Output::orderBy('kode_output', 'asc')->get();
    $ssuboutput = Sub_Output::orderBy('kode_suboutput', 'asc')->get();
    $sinput = Input::orderBy('kode_input', 'asc')->get();
    return view('admin.daftar_input', compact('soutput','ssuboutput', 'sinput', 'no'));
}
public function simpan_input(InputRequest $request)
{
    $input = $request->all();
    try 
    {
    Input::create($input);
    } 
    catch (QueryException $e) {
    return redirect()->route('daftar_input');
    }
        
    return redirect()->route('daftar_input'); 
    }
public function edit_input($id)
{
    $no = "1";
    $sinput = Input::FindOrFail($id);
    return view('admin.edit_input', compact('sinput', 'no'));
}
public function update_input(InputRequest $request, $id)
{
    $sinput = Input::whereId($id)->firstOrFail();
    $input = $request->all();
    try 
    {
    $sinput->update($input);
    } 
    catch (QueryException $e) {
        return redirect()->back();
    }
    return redirect()->route('daftar_input');
}
public function delete_input($id)
{
    
        $sinput = Input::FindOrFail($id);
        $sinput->delete();
        
        return redirect()->route('daftar_input');
}
#subinput
public function daftar_subinput()
{
    $no = "1";
    $soutput = Output::orderBy('kode_output', 'asc')->get();
    $ssuboutput = Sub_Output::orderBy('kode_suboutput', 'asc')->get();
    $sinput = Input::orderBy('kode_input', 'asc')->get();
    $ssubinput = Sub_Input::orderBy('kode_subinput', 'asc')->get();
    return view('admin.daftar_subinput', compact('soutput','ssuboutput','sinput','ssubinput', 'no'));
}
public function simpan_subinput(SubInputRequest $request)
{
    $input = $request->all();
    try 
    {
    Sub_Input::create($input);
    } 
    catch (QueryException $e) {
    return redirect()->route('daftar_subinput');
    }
        
    return redirect()->route('daftar_subinput'); 
    }
public function edit_subinput($id)
{
    $no = "1";
    $ssubinput = Sub_Input::FindOrFail($id);
    return view('admin.edit_subinput', compact('ssubinput', 'no'));
}
public function update_subinput(SubInputRequest $request, $id)
{
    $ssubinput = Sub_Input::whereId($id)->firstOrFail();
    $input = $request->all();
    try 
    {
    $ssubinput->update($input);
    } 
    catch (QueryException $e) {
        return redirect()->back();
    }
    return redirect()->route('daftar_subinput');
}
public function delete_subinput($id)
{
    
        $ssubinput = Sub_Input::FindOrFail($id);
        $ssubinput->delete();
        
        return redirect()->route('daftar_subinput');
}
#akun
    public function daftar_akun()
    {
        $no = "1";
        $sakun = Akun::orderBy('id', 'asc')->get();
        return view('admin.daftar_akun', compact('sakun', 'no'));
    }
   public function simpan_akun(AkunRequest $request)
{
    $input = $request->all();
    try 
    {
    Akun::create($input);
    } 
    catch (QueryException $e) {
    return redirect()->route('daftar_akun');
    }
        
    return redirect()->route('daftar_akun'); 
    }
public function edit_akun($id)
{
    $no = "1";
    $sakun = Akun::FindOrFail($id);
    return view('admin.edit_akun', compact('sakun', 'no'));
}
public function update_akun(AkunRequest $request, $id)
{
    $sakun = Akun::whereId($id)->firstOrFail();
    $input = $request->all();
    try 
    {
    $sakun->update($input);
    } 
    catch (QueryException $e) {
        return redirect()->back();
    }
    return redirect()->route('daftar_akun');
}
public function delete_akun($id)
{
    
        $sakun = Akun::FindOrFail($id);
        $sakun->delete();
        
        return redirect()->route('daftar_akun');
}
}

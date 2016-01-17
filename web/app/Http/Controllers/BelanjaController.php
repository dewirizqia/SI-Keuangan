<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\BelanjaRequest;

//model
use App\Kegiatan;
use App\Output;
use App\Sub_Output;
use App\Input;
use App\Sub_Input;
use App\Akun;
use App\Belanja;
use App\User;
use App\Detail_User;

use Mail;
use Auth;
use App\Pagu;
use App\Pagu_Bagian;
use App\Komentar;


use App\Http\Requests;
use App\Http\Controllers\Controller;

class BelanjaController extends Controller
{

    public function belanja_daftar()
    {
        $no = "1";
        $daftar_belanja = Belanja::latest()->get();
        // $id_bagian = Auth::user()->nama;
        $pagu = Pagu::latest()->get();        
        return view('belanja.belanja_daftar', compact('no', 'daftar_belanja', 'pagu'));
    }

    public function belanja_buat()
    {
    	$output = Output::latest()->get();
    	$suboutput = Sub_Output::latest()->get();
        $input = Input::latest()->get();
        $subinput = Sub_Input::latest()->get();
        $akun = Akun::latest()->get();

        return view('belanja.belanja_buat', compact('output', 'suboutput','input', 'subinput', 'akun'));
    }


    public function belanja_simpan(BelanjaRequest $request)
    {
        $qoutput = Output::FindOrFail($request['output']);
        $qsuboutput = Sub_Output::FindOrFail($request['sub_output']);
        $qinput = Input::FindOrFail($request['input']);
        $qsubinput = Sub_Input::FindOrFail($request['sub_input']);
        
        $input = $request->all();
        
        $user = User::FindOrFail($request['id_user']);
        $id_bagian = $user->id_bagian;
        $tahun = substr($request['tgl'], 0, 4);
        $pagu = Pagu::whereTahun($tahun)->FirstOrFail();        
        $pagu_bagian = Pagu_Bagian::whereId_pagu($pagu->id)->whereId_bagian($user->id_bagian)->FirstOrFail();
        
        $input['id_pagu_bagian'] = $pagu_bagian->id;
        $input['Kode_MA'] = $qoutput->kode_output. '.' .$qsuboutput->kode_suboutput. '.' .$qinput->kode_input.$qsubinput->kode_subinput; 
        
        try {
            Belanja::create($input);
        } 
        catch (QueryException $e) {
            return redirect()->route('belanja_buat');
        }
            
        return redirect()->route('belanja_daftar');
    }

    public function belanja_edit($id)
    {
        $output = Output::latest()->get();
        $suboutput = Sub_Output::latest()->get();
        $input = Input::latest()->get();
        $subinput = Sub_Input::latest()->get();
        $akun = Akun::latest()->get();
        $belanja = Belanja::FindOrFail($id);
        $qakun = $belanja->MAK;
        $mak = Akun::whereKode_akun($qakun)->FirstOrFail();
        
        return view('belanja.belanja_edit', compact('belanja','output', 'suboutput','input', 'subinput', 'akun', 'mak'));
    }

    public function belanja_update(BelanjaRequest $request, $id)
    {
        $qoutput = Output::FindOrFail($request['output']);
        $qsuboutput = Sub_Output::FindOrFail($request['sub_output']);
        $qinput = Input::FindOrFail($request['input']);
        $qsubinput = Sub_Input::FindOrFail($request['sub_input']);
        
        $input = $request->all();
        $user = User::FindOrFail($request['id_user']);
        $id_bagian = $user->id_bagian;
        $tahun = substr($request['tgl'], 0, 4);
        $pagu = Pagu::whereTahun($tahun)->FirstOrFail();        
        $pagu_bagian = Pagu_Bagian::whereId_pagu($pagu->id)->whereId_bagian($user->id_bagian)->FirstOrFail();

        $input['id_pagu_bagian'] = $pagu_bagian->id;
        $input['Kode_MA'] = $qoutput->kode_output. '.' .$qsuboutput->kode_suboutput. '.' .$qinput->kode_input.$qsubinput->kode_subinput;

        $belanja = Belanja::FindOrFail($id);

        
        try{
            $belanja->update($input);
        } 
        catch (QueryException $e) {
            return redirect()->back();
        }
        
        return redirect()->route('belanja_daftar');
    }

    public function belanja_delete($id)
    {
        $belanja = Belanja::FindOrFail($id);
        $belanja->delete();
        
        return redirect()->route('belanja_daftar');
    }

    public function status_belanja_subbag($id)
    {
        $belanja = Belanja::FindOrFail($id);
        $status = "subbag";
        $belanja->status = $status;
        $belanja->save();

        $detail_bpp = Detail_User::whereJabatan('bpp')->get();
        Mail::send('emails.status_belanja_subbag', [],function($message) use ($detail_bpp)
            {
                foreach ($detail_bpp as $user_bpp) {
                $email = $user_bpp->ke_user->email;
                $message->to($email)->from('19dewi@gmail.com', 'dewi')
                ->subject('Rekap Belanja');
                }    
            });
        return redirect()->route('belanja_daftar');
    }
    
    public function status_belanja_bpp($id)
    {
        $belanja = Belanja::FindOrFail($id);
        $belanja->status = 'bpp';
        $belanja->save;

        $detail_ppk = Detail_User::whereJabatan('ppk')->get();
        Mail::send('emails.status_belanja_bpp', function($message) use ($detail_ppk)
            {
                foreach ($detail_ppk as $user_ppk) {
                $email = $user_ppk->ke_user->email;
                $message->to($email)->from('19dewi@gmail.com', 'dewi')
                ->subject('Rekap Belanja');
                }    
            });
        return redirect()->route('belanja_daftar');
    }
    public function status_belanja_ppk($id)
    {
        $belanja = Belanja::FindOrFail($id);
        $belanja->status = 'ppk';
        $belanja->save;
        $id_bagian = Auth::user()->id_bagian;
        $detail_bagian = User::whereId_bagian($id_bagian)->with('detail_user')->get();
        Mail::send('emails.status_belanja_ppk', function($message) use ($detail_bagian)
            {
                foreach ($detail_bagian as $user_bagian) {
                $email = $user_bagian->ke_user->email;
                $message->to($email)->from('19dewi@gmail.com', 'dewi')
                ->subject('Rekap Belanja');
                }    
            });
        return redirect()->route('belanja_daftar');
    }
        
    public function belanja_komentar($id)
    {
        $belanja = Belanja::FindOrFail($id);
        $daftar_komentar = Komentar::whereJenis('belanja')->whereId_jenis($id)->latest()->get();
        return view('belanja.belanja_komentar', compact('belanja', 'daftar_komentar'));
    }

    public function belanja_komentar_simpan(Request $request)
    {
        $input = $request->all();
        $id = $request['id_jenis'];        

        try {
            Komentar::create($input);
        } 
        catch (QueryException $e) {
            return redirect()->route('belanja_komentar');
        }
        
        return redirect()->route('belanja_komentar', compact('id'));
    }
    
    public function belanja_bagian_daftar($id)
    {
        $no = "1";
        $quser = User::whereId_bagian($id)->FirstOrFail();
        $id_user = $quser->id;
        $daftar_belanja = Belanja::whereId_user($id_user)->get();
        
        return view('belanja.belanja_bagian_daftar', compact('no', 'daftar_belanja'));
    }

    public function belanja_bagian_komentar($id)
    {
        $belanja = Belanja::FindOrFail($id);
        $daftar_komentar = Komentar::whereJenis('belanja')->whereId_jenis($id)->latest()->get();
        return view('belanja.belanja_bagian_komentar', compact('belanja', 'daftar_komentar'));
    }
}

    
<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SPJ_UP extends Model
{
    protected $table = 'spj';

    protected $fillable = ['id_bagian', 'id_subinput', 'id_akun', 'untuk_pembayaran', 'total', 'status'];

    public function ke_bagian()
    {
    	return $this->belongsTo('App\Bagian', 'id_bagian');
    }

    public function sub_input()
    {
    	return $this->belongsTo('App\Sub_Input', 'id_subinput');
    }

    public function akun()
    {
    	return $this->belongsTo('App\Akun', 'id_akun');
    }

    public function detail()
    {
        return $this->hasMany('App\SPJ_UP_Detail', 'id_spj');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Akun extends Model
{
    protected $table = 'akun';

    protected $fillable = ['kode_akun', 'uraian_akun'];

    public function detail()
    {
    	return $this->hasMany('App\Detail_Usulan', 'id_akun');
    }
    public function rkakl()
    {
        return $this->hasMany('App\Detail_Rkakl');
    }

    public function spj_up()
    {
        return $this->hasMany('App\SPJ_UP');
    }
}

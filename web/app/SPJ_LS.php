<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SPJ_LS extends Model
{
    protected $table = 'ls';

    protected $fillable = ['id_bagian', 'kode_anggaran', 'kode_akun', 'rekapitulasi',
    						'no_sk' , 'tgl_sk','nama_kegiatan', 'jmlh_penerima', 
    						'jmlh_kotor', 'pph', 'jmlh_bersih','keterangan', 'status'];

    public function daftar_nominatif()
    {
    	return $this->hasMany('App\Daftar_Nominatif', 'id_ls');
    }

    public function detail()
    {
        return $this->hasMany('App\SPJ_LS_Detail', 'id_ls');
    }

    public function ke_bagian()
    {
    	return $this->belongsTo('App\Bagian', 'id_bagian');
    }
}

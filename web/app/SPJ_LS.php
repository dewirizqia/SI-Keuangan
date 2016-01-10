<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SPJ_LS extends Model
{
    protected $table = 'ls';

    protected $fillable = ['id_bagian', 'kode_anggaran', 'rekapitulasi',
    						'no_sk' ,'nama_kegiatan', 'jmlh_penerima', 
    						'jmlh_kotor', 'pph', 'jmlh_bersih','keterangan'];

    public function daftar_nominatif()
    {
    	return $this->hasMany('App\Daftar_Nominatif', 'id_ls');
    }
}

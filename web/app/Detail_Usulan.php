<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detail_Usulan extends Model
{
    protected $table = 'detail_usulan';

    protected $fillable = ['id_usulan', 'jumlah_rincian', 'detail', 'harga_satuan', 'jumlah', 'jenis_komponen', 'id_subinput', 'id_akun'];

    public function usulan()
    {
    	return $this->belongsTo('App\Usulan', 'id_usulan');
    }
    public function sub_input()
    {
    	return $this->belongsTo('App\Sub_Input', 'id_subinput');
    }

    public function rincian()
    {
    	return $this->hasMany('App\Rincian_Perhitungan', 'id_detail_usulan');
    }
}

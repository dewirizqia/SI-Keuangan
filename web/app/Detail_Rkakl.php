<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detail_Rkakl extends Model
{
    protected $table = 'detail_rkakl';

    protected $fillable = ['id_rkakl', 'id_akun', 'id_subinput', 'detail', 'volume', 'satuan', 'harga_satuan', 'jumlah_biaya'];

    public function rkakl()
    {
    	return $this->belongsTo('App\Rkakl', 'id_rkakl');
    }
    public function sub_input()
    {
    	return $this->belongsTo('App\Sub_Input', 'id_subinput');
    }
    public function akun()
    {
        return $this->belongsTo('App\Akun', 'id_akun');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detail_Usulan extends Model
{
    protected $table = 'detail_usulan';

    protected $fillable = ['id_usulan', 'nominal', 'satuan', 'detail', 'harga_satuan', 'jumlah', 'jenis_komponen', 'id_subinput', 'id_akun','prodi'];

    public function usulan()
    {
    	return $this->belongsTo('App\Usulan', 'id_usulan');
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

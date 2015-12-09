<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rincian_Perhitungan extends Model
{
    protected $table = 'rincian_perhitungan';

    protected $fillable = ['id_detail_usulan','nominal', 'satuan'];

    public function detail_usulan()
    {
    	return $this->belongsTo('App\Detail_Usulan', 'id_detail_usulan');
    }
}

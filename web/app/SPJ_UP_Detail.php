<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SPJ_UP_Detail extends Model
{
    protected $table = 'detail_spj';

    protected $fillable = ['id_spj', 'nama', 'jabatan', 'jumlah_jam', 'satuan', 'terima_kotor', 'pajak', 'terima_bersih'];

    public function spj_up()
    {
    	return $this->belongsTo('App\SPJ_UP', 'id_spj');
    }
}

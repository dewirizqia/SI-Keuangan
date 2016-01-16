<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SPJ_LS_Detail extends Model
{
    protected $table = 'lamp_ls';

    protected $fillable = ['id_ls', 'nama', 'jabatan', 'jlh_hari', 'satuan', 'terima', 'pph', 'terima_bersih'];

    public function spjls()
    {
    	return $this->belongsTo('App\SPJ_LS', 'id_ls');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usulan extends Model
{
    protected $table = 'usulan';

    protected $fillable = ['tahun', 'revisi', 'status', 'id_bagian'];

    public function ke_bagian()
    {
    	return $this->belongsTo('App\Bagian', 'id_bagian');
    }
    
    public function detail_usulan()
    {
    	return $this->hasMany('App\Detail_Usulan', 'id_usulan');
    }


}

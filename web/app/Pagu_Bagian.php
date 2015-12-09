<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pagu_Bagian extends Model
{
    protected $table = 'pagu_bagian';

    protected $fillable = ['id_bagian', 'id_pagu', 'jumlah'];

    public function pagu()
    {
    	return $this->belongsTo('App\Pagu', 'id_pagu');
    }
    public function ke_bagian()
    {
    	return $this->belongsTo('App\Bagian', 'id_bagian');
    }
}

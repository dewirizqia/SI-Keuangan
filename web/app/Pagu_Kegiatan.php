<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pagu_Kegiatan extends Model
{
    protected $table = 'pagu_kegiatan';

    protected $fillable = ['id_subinput', 'id_pagu', 'batasan', 'alokasi', 'sisa'];

    public function pagu()
    {
    	return $this->belongsTo('App\Pagu', 'id_pagu');
    }
    public function subinput()
    {
    	return $this->belongsTo('App\Sub_Input', 'id_subinput');
    }
}

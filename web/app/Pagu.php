<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pagu extends Model
{
    protected $table = 'pagu';

    protected $fillable = ['alokasi', 'tahun'];

    public function pagu_bagian()
    {
    	return $this->hasMany('App\Pagu_Bagian');
    }
    public function pagu_output()
    {
    	return $this->hasMany('App\Pagu_Output');
    }
    public function pagu_kegiatan()
    {
        return $this->hasMany('App\Pagu_Kegiatan');
    }
    public function rkakl()
    {
        return $this->hasOne('App\Rkakl');
    }
}

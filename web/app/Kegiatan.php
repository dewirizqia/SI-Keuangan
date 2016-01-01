<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kegiatan extends Model
{
	protected $table = 'kegiatan';

    protected $fillable = ['kode_kegiatan', 'sumberdana_kegiatan'];

    public function output()
    {
    	return $this->hasMany('App\Output');
    }
}

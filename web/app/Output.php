<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Output extends Model
{
    protected $table = 'output';

    protected $fillable = ['kode_output', 'uraian', 'id_kegiatan'];

    public function kegiatan()
    {
        return $this->belongsTo('App\Kegiatan', 'id_kegiatan');
    }

    public function sub_output()
    {
    	return $this->hasMany('App\Sub_Output');
    }
    public function pagu_output()
    {
    	return $this->belongsToMany('App\Pagu_Output', 'id_output');
    }
}

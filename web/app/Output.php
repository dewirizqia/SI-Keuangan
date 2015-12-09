<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Output extends Model
{
    protected $table = 'output';

    protected $fillable = ['kode_output', 'uraian'];

    public function sub_output()
    {
    	return $this->hasMany('App\Sub_Output');
    }
    public function pagu_output()
    {
    	return $this->belongsToMany('App\Pagu_Output', 'id_output');
    }
}

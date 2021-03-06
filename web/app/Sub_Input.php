<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sub_Input extends Model
{
    protected $table = 'sub_input';

    protected $fillable = ['kode_subinput', 'uraian'];

    public function input()
    {
    	return $this->belongsTo('App\Input', 'id_input');
    }
    public function usulan()
    {
    	return $this->hasMany('App\Detail_Usulan', 'id_input');
    }
}

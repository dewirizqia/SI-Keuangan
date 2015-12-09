<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Input extends Model
{
	protected $table = 'input';

    protected $fillable = ['kode_input', 'uraian'];

    public function sub_output()
    {
    	return $this->belongsTo('App\Sub_Output', 'id_suboutput');
    }

    public function sub_input()
    {
    	return $this->hasMany('App\Sub_Input');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sub_Output extends Model
{
    protected $table = 'sub_output';

    protected $fillable = ['kode_suboutput', 'uraian', 'id_output'];

    public function output()
    {
    	return $this->belongsTo('App\Output', 'id_output');
    }

}

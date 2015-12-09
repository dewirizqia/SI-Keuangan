<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pagu_Output extends Model
{
    protected $table = 'pagu_output';

    protected $fillable = ['id_output', 'jumlah', 'id_pagu'];

    public function pagu()
    {
    	return $this->belongsTo('App\Pagu', 'id_pagu');
    }
    public function ke_output()
    {
    	return $this->belongsTo('App\Output', 'id_output');
    }
}

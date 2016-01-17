<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rkakl extends Model
{
    protected $table = 'rkakl';

    protected $fillable = ['id_pagu', 'revisi'];

    public function pagu()
    {
    	return $this->belongsTo('App\Pagu', 'id_pagu');
    }
    public function detail()
    {
    	return $this->HasMany('App\Detail_Rkakl');
    }
}

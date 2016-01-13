<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bagian extends Model
{
    protected $table = 'bagian';

    protected $fillable = ['bagian', 'detail'];

    public function usulan()
    {
    	return $this->belongsTo('App\Usulan', 'id_bagian');
    }

    public function pagu_bagian()
    {
    	return $this->belongsTo('App\Pagu_Bagian', 'id_bagian');
    }
    public function user()
    {
        return $this->belongsTo('App\User', 'id');
    }
}

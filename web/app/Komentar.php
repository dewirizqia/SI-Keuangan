<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Komentar extends Model
{
    protected $table = 'komentar';

    protected $fillable = ['id_user', 'jenis', 'id_jenis', 'komentar'];

    public function user()
    {
    	return $this->belongsTo('App\User', 'id_user');
    }
}

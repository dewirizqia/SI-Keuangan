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
        return $this->hasOne('App\User', 'id_bagian');
        }
    public function spj_up()
    {
        return $this->hasMany('App\SPJ_UP', 'id_bagian');

    }

    public function spj_ls()
    {
        return $this->hasMany('App\SPJ_LS', 'id_bagian');
    }
}

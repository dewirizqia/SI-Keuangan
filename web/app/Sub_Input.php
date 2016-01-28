<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sub_Input extends Model
{
    protected $table = 'sub_input';

    protected $fillable = ['kode_subinput', 'uraian', 'id_input','status','users_id'];

    public function input()
    {
    	return $this->belongsTo('App\Input', 'id_input');
    }
    public function usulan()
    {
    	return $this->hasMany('App\Detail_Usulan');
    }
    public function rkakl()
    {
        return $this->hasMany('App\Detail_Rkakl');
    }
    public function pagu_kegiatan()
    {
        return $this->hasOne('App\Pagu_Kegiatan');
    }
     public function spj_up()
    {
        return $this->hasMany('App\SPJ_UP');
    }
}

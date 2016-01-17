<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Belanja extends Model
{
    protected $table = 'belanja';

    protected $fillable = ['id_pagu_bagian', 'id_user', 'no_tanda_bukti', 
    						'tgl', 'volume', 'no_bku', 'Kode_MA', 'MAK',
    						'penerima', 'uraian', 'jumlah', 'status' ];

    public function user()
    {
        return $this->belongsTo('App\User', 'id_user');
    }
}

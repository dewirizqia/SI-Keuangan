<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detail_Rkakl extends Model
{
    protected $table = 'detail_rkakl';

    protected $fillable = ['id_rkakl', 'id_akun', 'id_subinput', 'detail', 'volume', 'satuan', 'harga_satuan', 'jumlah_biaya'];
}

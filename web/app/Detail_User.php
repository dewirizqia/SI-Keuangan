<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detail_User extends Model
{
    protected $table = 'detail_user';

    protected $fillable = [ 'id_user', 'jabatan', 'bagian_id'];

    public function user()
    {
        return $this->belongsTo('App\User', 'id_user');
    }
}

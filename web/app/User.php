<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Zizaco\Entrust\Traits\EntrustUserTrait;

class User extends Model implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword, EntrustUserTrait{
        EntrustUserTrait::can insteadof Authorizable;
    }

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'nama', 'password', 'nip', 'id_bagian'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    public function detail_user()
    {
        return $this->hasMany('App\Detail_User', 'id_user');
    }
    public function ke_bagian()
    {
        return $this->belongsTo('App\Bagian', 'id_bagian');
    }
    public function belanja()
    {
        return $this->hasMany('App\Komentar', 'id_user');
    }    
    public function komentar()
    {
        return $this->hasMany('App\Komentar', 'id_user');
    }
}

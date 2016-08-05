<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;

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
    protected $fillable = ['name', 'email', 'password', 'role'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token', 'password_temp', 'code', 'active'];

    public function notes()
    {
        return $this->hasMany('App\Note', 'id_user');
    }

    public function activities()
    {
        return $this->hasMany('App\Activity', 'id_user');
    }

    public function waters()
    {
        return $this->hasMany('App\Water', 'id_user');
    }

    public function lights()
    {
        return $this->hasMany('App\Light', 'id_user');
    }

    public function phones()
    {
        return $this->hasMany('App\Phone', 'id_user');
    }

    public function social_securities()
    {
        return $this->hasMany('App\SocialSecurity', 'id_user');
    }

    public function faovs()
    {
        return $this->hasMany('App\Faov', 'id_user');
    }

    public function sumats()
    {
        return $this->hasMany('App\Sumat', 'id_user');
    }
}

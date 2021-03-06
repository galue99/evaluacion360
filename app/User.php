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
    protected $fillable = ['id', 'firstname', 'lastname', 'idrol', 'email', 'password', 're-password', 'company_id', 'status'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['remember_token'];


    public function rol()
    {
        return $this->belongsTo('App\Rol');
    }

    public function company()
    {
        return $this->belongsTo('App\Company');
    }

    public function encuesta()
    {
        return $this->belongsToMany('App\User','users_encuestas')->withPivot('user_id','status');
    }

    public function evaluador()
    {
        return $this->hasMany('App\User', 'App\Encuestado', 'evaluador_id', 'id');
    }


}

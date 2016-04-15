<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserEncuesta extends Model
{
    protected $table = 'users_encuestas';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id'];
    
    public function evaluado(){
        return $this->belongsTo('App\User','evaluador_id');
    }
    
    public function evaluadores(){
        return $this->hasMany('App\User','id','user_id');
    }


}

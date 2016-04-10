<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Encuestado extends Model
{
    protected $table = 'users_encuestas';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id', 'encuesta_id', 'status', 'evaluado_id'];


    public function user() {
        return $this->belongsToMany('App\User','users_encuestas')->withPivot('encuesta_id','status');
    }

    public function evaluado() {
        return $this->belongsToMany('App\User','users_encuestas')->withPivot('evaluado_id');
    }





}

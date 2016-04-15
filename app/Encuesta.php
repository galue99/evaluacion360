<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Encuesta extends Model
{
    protected $table = 'encuestas';

    protected $fillable = ['date', 'persona_id'];


    public function user() {
        return $this->belongsToMany('App\User','users_encuestas')->withPivot('encuesta_id','status', 'evaluador_id', 'user_id');
    }

    public function items()
    {
        return $this->hasMany('App\Item');
    }

    public function frases()
    {
        return $this->hasManyThrough('App\Frase', 'App\Item', 'encuesta_id', 'items_id');
    }

    public function encuestado()
    {
        return $this->hasMany('App\Encuestado');
    }

    public function evaluado()
    {
        return $this->belongsToMany('App\User', 'users_encuestas', 'id', 'evaluador_id');
    }
    
    public function evaluadores(){
        return $this->belongsToMany('App\User', 'users_encuestas','encuesta_id','evaluador_id');

    }

}

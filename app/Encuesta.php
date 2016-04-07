<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Encuesta extends Model
{
    protected $table = 'encuestas';

    protected $fillable = ['date', 'persona_id'];


    public function user() {
        return $this->belongsToMany('App\User','users_encuestas')->withPivot('encuesta_id','status');
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

}

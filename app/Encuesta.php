<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Encuesta extends Model
{
    protected $table = 'encuestas';

    protected $fillable = ['date', 'persona_id'];

    public function persona() {
        return $this->belongsTo('App\Persona');
    }

    public function items()
    {
        return $this->hasMany('App\Item');
    }

    public function frases()
    {
        return $this->hasManyThrough('App\Frase', 'App\Item', 'encuesta_id', 'items_id');
    }

    public function evaluador()
    {
        return $this->hasMany('App\Evaluador');
    }

}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comportamiento extends Model
{
    protected $table = 'comportamientos';

    public function competenia()
    {
        return $this->belongsTo('App\Competencia');
    }
}

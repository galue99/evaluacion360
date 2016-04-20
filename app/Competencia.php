<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Competencia extends Model
{
    protected $table = 'competencias';


    public function comportamiento()
    {
        return $this->hasMany('App\Comportamiento');
    }
}

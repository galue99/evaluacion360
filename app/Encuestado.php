<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Encuestado extends Model
{
    protected $table = 'encuestados';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id', 'encuesta_id', 'is_active'];
}

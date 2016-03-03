<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evaluador extends Model
{
    protected $table = 'evaluadores';

    protected $fillable = ['full_name', 'email', 'is_activate'];


}

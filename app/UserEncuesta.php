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


}

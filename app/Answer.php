<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
   protected $table = 'answers';

   protected $fillable = ['name'];


	public function frase() {
        return $this->belongsTo('App\Frase');
    }

}

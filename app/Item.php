<?php
/**
 * Created by PhpStorm.
 * User: edgar
 * Date: 01/03/16
 * Time: 12:26 PM
 */
namespace App;

use Illuminate\Database\Eloquent\Model;
class Item extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'items';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['items', 'encuesta_id'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */

    public function encuesta() {
        return $this->belongsTo('App\Encuesta');
    }

    public function frases()
    {
        return $this->hasMany('App\Frase');
    }
}
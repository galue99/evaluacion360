<?php
/**
 * Created by PhpStorm.
 * User: edgar
 * Date: 01/03/16
 * Time: 12:46 AM
 */
namespace App;

use Illuminate\Database\Eloquent\Model;


class Persona extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'personas';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['firstname', 'lastname'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */


    public function encuesta()
    {
        return $this->hasMany('App\Encuesta');
    }
}

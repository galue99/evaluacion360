<?php
/**
 * Created by PhpStorm.
 * User: edgar
 * Date: 01/03/16
 * Time: 12:26 PM
 */
namespace App;

use Illuminate\Database\Eloquent\Model;
class Company extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'companys';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['url', 'name'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */


    public function user()
    {
        return $this->hasMany('App\User');
    }

}
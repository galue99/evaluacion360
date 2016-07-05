<?php
/**
 * Created by PhpStorm.
 * User: edgar
 * Date: 18/05/16
 * Time: 09:24 PM
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class Cronjob extends Model {

    use SoftDeletes;

    protected $table = 'cronjob';

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }
}

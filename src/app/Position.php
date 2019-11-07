<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    //

    /**
     * The users that belong to the position.
     */
    public function users()
    {
        return $this->belongsToMany('App\User', 'club_user');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserClub extends Model
{
    //
    protected $table = 'club_user';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'club_id', 'position_id', 
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'remember_token',
    ];

    /**
     * Get the users for the club.
     */
    // public function users()
    // {
    //     return $this->belongsTo('App\User');
    // }

    /**
     * Get the positions for the club.
     */
    // public function positions()
    // {
    //     return $this->belongsTo('App\Position');
    // }
}

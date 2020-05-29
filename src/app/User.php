<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'unikl_id', 'phone_no', 'gender', 'dob',
    ];

    protected $dates = ['created_at'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The clubs that belong to the user.
     */
    public function clubs()
    {
        return $this->belongsToMany('App\Club');
    }

    /**
     * The positions that belong to the user.
     */
    public function positions()
    {
        return $this->belongsToMany('App\Position', 'club_user');
    }

    /**
     * The events that belong to the user.
     */
    public function events()
    {
        return $this->belongsToMany('App\Event');
    }

    /**
     * The meetings that belong to the user.
     */
    public function meetings()
    {
        return $this->belongsToMany('App\Meeting');
    }
}

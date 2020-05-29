<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Club extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'semester', 'description', 'domain_id', 'requirement', 'capacity', 'fees', 'url_fb', 'url_ig', 'url_email',
    ]; 

    /**
     * The users that belong to the club.
     */
    public function users()
    {
        return $this->belongsToMany('App\User');
    }

    /**
     * The positions that belong to the club.
     */
    public function positions()
    {
        return $this->belongsToMany('App\Position', 'club_user');
    }

    /**
     * Get the images for the club.
     */
    public function images()
    {
        return $this->hasMany('App\ClubImage');
    }
}

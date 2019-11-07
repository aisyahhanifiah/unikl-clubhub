<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description', 'start_date', 'end_date', 'venue', 'level_id', 'category_id', 'domain_id', 'club_id', 'requirement', 'capacity', 'fees',
    ]; 

    /**
     * The users that belong to the event.
     */
    public function users()
    {
        return $this->belongsToMany('App\User');
    }

    /**
     * Get the images for the event.
     */
    public function images()
    {
        return $this->hasMany('App\EventImage');
    }
}

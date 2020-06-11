<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Events extends Model
{
    protected $table = 'events';

    protected $dates = [
        'event_date',
    ];

    protected $fillable = [
        'name', 'location_id', 'picture', 'event_date',
    ];

    public function userRequests()
    {
        return $this->hasMany('App\UserRequests', 'id');
    }

    public function locations()
    {
        return $this->belongsTo('App\Locations', 'location_id');
    }
}

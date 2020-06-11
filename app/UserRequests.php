<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserRequests extends Model
{
    protected $table = 'user_requests';

    protected $fillable = [
        'event_id', 'user_id', 'user_name', 'user_email', 'user_request_statuses_id',
    ];

    public function events()
    {
        return $this->belongsTo('App\Events', 'event_id');
    }

    public function status()
    {
        return $this->belongsTo('App\UserRequestStatuses', 'user_request_statuses_id');
    }

    public function isNew()
    {
        return $this->status->status == 'new';
    }

    public function isAccepted()
    {
        return $this->status->status == 'approved';
    }

    public function isRedjected()
    {
        return $this->status->status == 'rejected';
    }

}

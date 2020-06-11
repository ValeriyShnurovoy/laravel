<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserRequestStatuses extends Model
{
    protected $table = 'user_request_statuses';

    public $timestamps = false;

    protected $fillable = ['status'];

    public function userRequests()
    {
        return $this->hasMany(UserRequests::class);
    }
}

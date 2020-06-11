<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Locations extends Model
{
    protected $table = 'locations';

    public $timestamps = false;

    protected $fillable = ['location'];

    public function events()
    {
        return $this->hasMany('App\Events', 'id');
    }
}
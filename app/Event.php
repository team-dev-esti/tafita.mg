<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = ['description','finish_on','start_on','user_id'];

    public function files()
    {
        return $this->belongsToMany('App\File')->using('App\EventFile');
    }
}

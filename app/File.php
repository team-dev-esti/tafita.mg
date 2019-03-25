<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    public function users()
    {
        return $this->belongsToMany('App\User')->using('App\FileUser');
    }

    public function events()
    {
        return $this->belongsToMany('App\Event')->using('App\EventFile');
    }
}

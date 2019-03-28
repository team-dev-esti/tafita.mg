<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = ['title','description','finish_on','start_on','user_id'];

    public function files()
    {
        return $this->belongsToMany('App\File')->using('App\EventFile');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function userFilesNotFound($user)
    {
        $eventFiles = [];
        $userFiles = [];
        $filesNotFound = [];
        foreach ($this->files as $eventFile) {
            array_push($eventFiles,$eventFile->id);
        }
        foreach ($user->files as $userFile) {
            array_push($userFiles,$userFile->id);
        }
        for ($i=0; $i < count($eventFiles); $i++) { 
            if(!in_array($eventFiles[$i],$userFiles)){
                array_push($filesNotFound,$eventFiles[$i]);
            }
        }
        //dd($filesNotFound);
        return $filesNotFound;
    }
}

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

    public function userFilesNotFound($user)
    {
        $eventFiles = [];
        $userFiles = [];
        $filesNotFound = [];
        if($user!=null){        
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
        }
        //dd($filesNotFound);
        return $filesNotFound;
    }
}

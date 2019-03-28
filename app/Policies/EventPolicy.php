<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use App\Event;

class EventPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function participate(User $user,Event $event)
    {
        $eventFiles = [];
        $userFiles = [];
        $fileNotFound = 0;
        foreach ($event->files as $eventFile) {
            array_push($eventFiles,$eventFile->id);
        }
        foreach ($user->files as $userFile) {
            array_push($userFiles,$userFile->id);
        }
        for ($i=0; $i < count($eventFiles); $i++) { 
            if(!in_array($eventFiles[$i],$userFiles)){
                return false;
            }
        }
        return true;
        
    }
}

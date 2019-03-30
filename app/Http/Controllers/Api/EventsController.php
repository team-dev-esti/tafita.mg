<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use App\Event;
use App\User;
use App\EventUser;

class EventsController extends Controller
{

    public function index($user)
    {
        $events = Event::where([
            ['start_on', '<=', Carbon::now()],
            ['finish_on', '>=', Carbon::now()],
            ['user_id',$user]
        ])->latest()->get();
        return response()->json($events, 201);
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*
        'description'=>$request->myEvent->description,
            'start_on'=>$request->myEvent->start_on,
            'finish_on'=>$request->myEvent->finish_on,
        */
        $data = [
            'title'=>$request->title,
            'description'=>$request->description,
            'start_on'=>$request->start_on,
            'finish_on'=>$request->finish_on,
            'user_id'=>$request->user_id,
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now()
        ];
        
        $event = Event::create($data);
        
        $event->files()->attach($request->files_id);
 
        
        return response()->json($event, 201);
    }
    public function show($user,$event)
    {
        $event = Event::with('users')->where([
            ['id', $event],
            ['user_id',$user]
        ])->first();
        //$users = $event->users;
        return response()->json($event, 201);
    }

    public function showselected($event)
    {
        $users_id = [];
        $eventsUser = EventUser::where([
            ['event_id',$event],
            ['status',1]
        ])->get();
        foreach ($eventsUser as $key => $user) {
            array_push($users_id,$user->id);
        }
        $users = User::whereIn('id',$users_id)->get();
        //$users = $event->users;

        return response()->json($users, 201);
    }

    public function update(Request $request)
    {
        $data = [
            'status'=>$request->status
        ];
        $user = [
            'user_id'=>$request->user_id,
            'event_id'=>$request->event_id
        ];
        EventUser::where($user)->update($data);
        return response()->json($user, 201);
    }

    public function notify(Request $request)
    {
        $data = [
            "event_id"=> $request->event_id

        ];
        return response()->json( $request->event_id,201);
    }

}

<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Http\Request;
use Carbon\Carbon;

class EventsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $events = Event::latest()->paginate(25);

        return response()->json($events);
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $event = Event::findOrFail($id);

        return response()->json($event);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $event = Event::findOrFail($id);
        $event->update($request->all());

        return response()->json($event, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Event::destroy($id);

        return response()->json(null, 204);
    }
}

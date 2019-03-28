<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class EventsController extends Controller
{
    public function __construct()
    {
        $this->middleware('institute')->except(['index','store','show']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $events = Event::with('user')->where([
            ['start_on', '<=', Carbon::now()],
            ['finish_on', '>=', Carbon::now()]
        ])->latest()->get();

        return view('events.index',compact('events'));
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
        $incomplete = $event->userFilesNotFound(Auth::user());
        $notFoundFiles = $event->files->find($incomplete);
        return view('events.show',compact('event','notFoundFiles'));
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

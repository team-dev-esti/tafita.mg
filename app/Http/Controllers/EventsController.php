<?php

namespace App\Http\Controllers;

use App\Event;
use App\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\EventUser;

class EventsController extends Controller
{
    public function __construct()
    {
        $this->middleware('institute')->except(['index','store','show','participate']);
        $this->middleware('student')->only('participate');
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

    /**
     * Partcipate to evetn
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\Response
     */
    public function participate(Request $request)
    {
        $user = Auth::id();
        $u = new EventUser();
        $u->user_id = $user;
        $u->event_id = $request->event;
        $first = $u->where(["user_id"=>$user,"event_id"=>$request->event])->get();
        if(count($first) != null){
            return redirect()->back()->with(["success"=>"Votre candidature est déja envoyer"]);
        }
        else{
            $u->save();
            return redirect()->back()->with(["success"=>"Votre candidature est envoyer a cette evenement, vous recevrez un mail pour avoir les reponses de l'organisateur"]);
        }
        
    }
}

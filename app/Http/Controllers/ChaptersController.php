<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Chapter;
use Illuminate\Support\Facades\Auth;
use App\Mooc;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\ChaptersRequest;

class ChaptersController extends Controller
{
    public function __construct()
    {
        $this->middleware('verified')->except(['index','show']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($mooc)
    {
        $user = Auth::user();
        $mooc = Mooc::find($mooc);
        if($user->can('update',$mooc)){
            $chapter = new Chapter();
            $page = 'create';
            return view('chapters.create', compact('chapter','page','mooc'));
        }
        else{
            abort('401');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ChaptersRequest $request,$mooc)
    {
        $user = Auth::user();
        $mooc = Mooc::find($mooc);
        if($user->can('update',$mooc)){
            $chapter = array_merge($request->all(),['mooc_id'=>$mooc->id]);
            Chapter::create($chapter);
            return redirect()->back()->with(['success'=>'Chapitre creer']);
        }
        else{
            abort('401');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($mooc,$chapter)
    {
       $mooc = Mooc::find($mooc);
       $chapter = $mooc->chapters->where('id',$chapter)->first();
       return view('chapters.show',compact('chapter','mooc'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($mooc,$chapter)
    {
        $user = Auth::user();
        $mooc = Mooc::findOrFail($mooc);
        $chapter = Chapter::findOrFail($chapter);
        $page = 'update';
        if ($user->can('update', $mooc)) {
            return view('chapters.create',compact('chapter','page','mooc'));
        } else {
            return abort(401);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$mooc, $chapter)
    {
        $user = Auth::user();
        $mooc = Mooc::find($mooc);
        $chapter = Chapter::find($chapter);
        if ($user->can('update', $mooc)) {
            $chapter->update($request->all());
            return redirect()->back()->with(['success'=>'Article mise à jour']);
        } else {
            return abort(401);
        }  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($mooc,$chapter)
    {
        $user = Auth::user();
        $mooc = Mooc::find($mooc);
        //$chapter = Chapter::find($chapter);
        if ($user->can('delete', $mooc)) {
            Chapter::find($chapter)->destroy($chapter);
            return redirect()->route('mooc.index')->with(['success'=>'Article Supprimer']);
        } else {
            return abort(401);
        }
    }
}

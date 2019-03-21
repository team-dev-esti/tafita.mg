<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\MoocsRequest;
use App\Mooc;
use Illuminate\Support\Facades\Auth;

class MoocsController extends Controller
{
    public function __construct()
    {
        $this->middleware('contrib');
    }

    public function index()
    {
        $moocs = Mooc::all();
        return view('moocs.index',compact('moocs'));
    }

    public function show($mooc)
    {
        $mooc = Mooc::find($mooc);
        return view('moocs.show',compact('mooc'));
    }

    public function create()
    {
        $mooc = new Mooc();
        $page = 'create';
        return view('moocs.create',compact('mooc','page'));
    }

    public function store(MoocsRequest $request)
    {
        $mooc = array_merge($request->all(),['user_id'=>Auth::id()]);
        $mooc = Mooc::create($mooc);
        return redirect()->route('chapter.create',$mooc)->with(['success'=>'Mooc créer']);
    }
    public function edit($mooc)
    {
        $user = Auth::user();
        $mooc = Mooc::find($mooc);
        $page = 'update';
        if ($user->can('update', $mooc)) {
            return view('moocs.create',compact('mooc','page'));
        } else {
            return abort(401);
        }    
    }

    public function update(MoocsRequest $request,$mooc)
    {
        $user = Auth::user();
        $mooc = Mooc::find($mooc);
        if ($user->can('update', $mooc)) {
            $mooc->update($request->all());
            return redirect()->back()->with(['success'=>'Article mise à jour']);
        } else {
            return abort(401);
        }  
        
    }

    public function destroy($mooc){
        $mooc = Mooc::find($mooc);
        $user = Auth::user();
        if ($user->can('delete', $mooc)) {
            $mooc->destroy($mooc);
            return redirect()->back()->with(['success'=>'Mooc supprimer']);
        } else {
            return abort(401);
        }  
    }
}

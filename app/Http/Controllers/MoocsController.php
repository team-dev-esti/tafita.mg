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
        $this->middleware('student');
    }

    public function index()
    {
        return view('moocs.index');
    }

    public function create()
    {
        return view('moocs.create');
    }

    public function store(MoocsRequest $request)
    {
        $mooc = array_merge($request->all(),['user_id'=>Auth::id()]);
        Mooc::create($mooc);
        return redirect()->back()->with(['success'=>'Mooc créer']);
    }
}

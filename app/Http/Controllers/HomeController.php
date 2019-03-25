<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\File;
use App\FileUser;
use App\Http\Requests\FileUserRequest;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();
       if($user->isInstitute()){
            return view('home.institute',compact('user'));
       }
       elseif($user->isStudent()){
            $files = File::all();
            return view('home.student',compact('user','files'));
       }
    }

    public function storefile(FileUserRequest $request)
    {
        $user = Auth::user();
        $data = [];
        $i = 0;
        foreach ($request->files as $key => $file) {
            # code...

            $filename = $i+time(). '-' .$user->name.'.'.$file->getClientOriginalExtension();
            $request->file($key)->storeAs('uploads',$filename);
            $user_id = substr($key,-2,1);
            array_push($data,[
                "file_dir"=>$filename,
                "user_id"=>$user->id,
                "file_id"=>$user_id
            ]);
            $i++;
        }
        FileUser::insert($data);
        return redirect()->back()->with(['success'=>'Vos Dossier sont mis à jour']);
    }
}

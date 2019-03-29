<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\File;
use App\FileUser;
use App\Http\Requests\FileUserRequest;
use Illuminate\Console\Scheduling\Event;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('student')->except('index');
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

           
            $uf = [];
           foreach ($user->files as $key => $file) {
               # code...
               array_push($uf,$file->id);
           }
            $files = File::whereNotIn('id',$uf)->get();
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
            $file_id = substr($key,-2,1);
            $request->file($key)->storeAs('uploads/'.$user->id.'/'.$file_id ,$filename);
            array_push($data,[
                "file_dir"=>$filename,
                "user_id"=>$user->id,
                "file_id"=>$file_id
            ]);
            $i++;
        }
        FileUser::insert($data);
        return redirect()->back()->with(['success'=>'Vos Dossier sont mis à jour']);
    }

    public function editfile(FileUserRequest $request)
    {
        $user = Auth::user();
        return view('home.edit',compact('user'));
    }

    public function updatefile(FileUserRequest $request)
    {
        $user = Auth::user();
        $data = [];
        $condition = [];
        $i = 0;
        foreach ($request->files as $key => $file) {
            # code...
            $filename = $i+time(). '-' .$user->name.'.'.$file->getClientOriginalExtension();
            $file_id = substr($key,-2,1);
            $request->file($key)->storeAs('uploads/'.$user->id.'/'.$file_id ,$filename);
            array_push($data,[
                "file_dir"=>$filename,
                "user_id"=>$user->id,
                "file_id"=>$file_id
            ]);
            FileUser::where([
                ["user_id","=",$user->id],
                ["user_id","=",$file_id]
            ])->update(["file_dir"=>$filename]);

            $i++;
        }
       
        
        return redirect()->back()->with(["success"=>"Vos dossier sont mis à jour"]);
    }

    public function completefile($event){
        $event = Event::findOrFail($id);
        $incomplete = $event->userFilesNotFound(Auth::user());
        $notFoundFiles = $event->files->find($incomplete);
        return view("");
    }
}

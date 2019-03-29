<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\File;
use App\User;
use Illuminate\Support\Facades\Storage;
use App\FileUser;


class FilesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->only('show');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $files = File::all();
        return response()->json($files);
    }

    public function show(User $user,File $file)
    {
        $current = Auth::user();
        if($current->isAdmin() || $current->isInstitute() || $current->id === $user->id){
            $fileCollection = FileUser::where([
                ["user_id",$user->id],
                ["file_id",$file->id]
            ])->get();
            //dd($fileCollection);
            
            if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
                $uploadPath = $user->id.'\\'.$file->id.'\\'.$fileCollection[0]->file_dir;
                $pathToFile = storage_path('app\\uploads\\'.$uploadPath);
            } else {
                $uploadPath = $user->id.'/'.$file->id.'/'.$fileCollection[0]->file_dir;
                $pathToFile = storage_path('app/uploads/'.$uploadPath);
            }
            return response()->file($pathToFile);
        }
        else{
            abort(404);
        }
    }
    
}

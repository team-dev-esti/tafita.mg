<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\UsersRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    public function update(UsersRequest $request,$user)
    {
        if($user == Auth::id()){
            $user = User::find($user);
            $data = $request->all();
            unset($data['password_confirmation']);
            if($request->password == null){
                unset($data['password']);
            }
            $data['password'] = Hash::make($data['password']);
            $user->update($data);
            return redirect()->back()->with(['success'=>'Utilisateur mis à jour']);
        }
        else{
            abort(403);
        }
    }
}

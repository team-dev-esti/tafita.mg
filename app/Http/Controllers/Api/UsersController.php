<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class UsersController extends Controller
{
    public function show($id)
    {
        
        $user = User::with('files')->findOrFail($id);
        return response()->json($user,201);
    }
}

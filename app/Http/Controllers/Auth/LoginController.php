<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Socialite;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\User;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\AccountRegistred;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function redirectToProvider()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Obtain the user information from google.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback()
    {
        $user = Socialite::driver('google')->user();
        $exist = User::where('email',$user->email)->first();
        $name = explode(' ',$user->name);
        $passwd = $this->generatePassword(5);
        if(is_null($exist)){
           $newUser = User::create([
            'email' => $user->email,
            'name' => $name[0],
            'lastname' => $name[1],
            'password' => Hash::make($passwd),
            'email_verified_at'=>Carbon::now()->toDateTimeString(),
            'role_id' => 1,
           ]);
           Mail::to($user->email)->send(new AccountRegistred($passwd));
           Auth::login($newUser,true);
        }
        else{
            Auth::login($exist,true);
        }
        return redirect()->route('home');
    }

    private function generatePassword($chars)
    {
        return substr(str_shuffle(env('APP_KEY')),0,$chars);
    }
}

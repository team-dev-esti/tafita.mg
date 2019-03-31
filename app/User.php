<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','lastname','role_id','email_verified_at','gender','birth','avatar'
    ];
    

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function role()
    {
        return $this->belongsTo('App\Role');
    }

    public function moocs()
    {
        return $this->hasMany('App\Mooc');
    }

    public function files()
    {
        return $this->belongsToMany('App\File')->using('App\FileUser');
    }
    public function events()
    {
        return $this->hasMany('App\Events');
    }

    public function isStudent()
    {
        return $this->role->name === 'student';
    }
    public function isInstitute()
    {
        return $this->role->name === 'institute';
    }

    public function isAdmin()
    {
        return $this->role->name === 'admin';
    }
}

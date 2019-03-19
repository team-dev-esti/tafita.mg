<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mooc extends Model
{

    protected $fillable = [
        'title', 'resume', 'validate_at','pdf','user_id','thumbnail','youtube_video'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function chapters()
    {
        return $this->hasMany('App\Chapter','mooc_id');
    }
}

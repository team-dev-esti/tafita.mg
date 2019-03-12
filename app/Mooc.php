<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mooc extends Model
{

    protected $fillable = [
        'title', 'resume', 'validate_at','pdf','user_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class EventUser extends Model
{
    protected $table = "event_user";
    protected $fillable = ['user_id','event_id'];
}
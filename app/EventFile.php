<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class EventFile extends Pivot
{
    protected $fillable = ['file_id','event_id'];
}

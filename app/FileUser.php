<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class FileUser extends Pivot
{
    protected $fillable = ['file_dir','file_id','user_id'];
}

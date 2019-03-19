<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chapter extends Model
{
    protected $fillable = [
        'title', 'content', 'video','mooc_id'
    ];

    public function mooc(){
        return $this->belongsTo('App\Mooc');
    }
}

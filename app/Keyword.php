<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Keyword extends Model
{
    protected $guarded = ['id'];
    public function users()
    {
        return $this->belongsToMany(Job::class);
    }

    public function jobs()
    {
        return $this->belongsToMany(Job::class);
    }

}

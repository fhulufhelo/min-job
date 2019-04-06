<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $guarded = ['id'];

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function keywords()
    {
        return $this->belongsToMany(Keyword::class);
    }


    public function user()
    {
      return $this->belongsTo(User::class);
    }

    public function usersApplied()
    {
        return $this->belongsToMany(User::class);
    }
}

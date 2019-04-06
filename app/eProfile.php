<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class eProfile extends Model
{
  protected $guarded = ['id'];


    public function user()
    {
      return $this->belongsTo(User::class);
    }

    public function jobs()
    {
        return $this->hasMany(jobs::class);
    }


}

<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'type',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function jobs()
    {
        return $this->hasMany(Job::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function keywords()
    {
        return $this->belongsToMany(Keyword::class);
    }

    public function logo()
    {
        return $this->hasOne(Logo::class);
    }

    public function employerprofile()
    {
        return $this->hasOne(eProfile::class);
    }


    public function seekerprofile()
    {
        return $this->hasOne(sProfile::class);
    }

    public function document()
    {
        return $this->hasOne(Document::class);
    }


    public function jobApplied()
    {
        return $this->belongsToMany(Job::class);
    }
}

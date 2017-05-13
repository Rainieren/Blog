<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    use Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];

    public function comments()
    {
        //Heeft gelatie met comments tabel in
        return $this->hasMany('App\comment');
    }

    public function posts()
    {
        return $this->hasMany('App\post');
    }

    public function isAdmin()
    {
        return(Auth::user()->role == 1);
    }
}

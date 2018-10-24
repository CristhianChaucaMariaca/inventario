<?php

namespace App;

use Caffeinated\Shinobi\Traits\ShinobiTrait;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;


class User extends Authenticatable
{
    use Notifiable, ShinobiTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function drivers(){
        return $this->hasMany(Driver::class);
    }

    public function role(){
        return $this->belongsToMany(Role::class);
    }

    //Scopes
    public function scopeName($query,$name){
        if ($name) {
            return $query->where('name','LIKE',"%$name%");
        }
    }
}

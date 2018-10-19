<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Caffeinated\Shinobi\Traits\ShinobiTrait;

class Driver extends Model
{
	use ShinobiTrait;
    protected $fillable=
    [
    	'user_id','name','last_name','phone','address','ci','license','status',
    ];

    public function user(){
    	return $this->belongsTo(User::class);
    }

    public function sales(){
    	return $this->hasMany(Sale::class);
    }

    //Scope

    
}

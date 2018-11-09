<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Caffeinated\Shinobi\Traits\ShinobiTrait;

class Provider extends Model
{
	use ShinobiTrait;
    protected $fillable=[
    	'name','address','phone',
    ];

    //Scopes
    public function scopeName($query,$name){
    	if ($name) {
    		return $query->where('name','LIKE',"%$name%");
    	}
    }
    public function buys(){
        return $this->hasMany(Buy::class);
    }
}

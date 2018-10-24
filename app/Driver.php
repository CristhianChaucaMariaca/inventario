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
    public function scopeName($query,$name){
        if ($name) {
            return $query->where('name','LIKE',"%$name%");
        }
    }

    public function scopeLast_name($query,$last_name){
        if ($last_name) {
            return $query->where('last_name','LIKE',"%$last_name%");
        }
    }
}

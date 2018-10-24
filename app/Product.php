<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Caffeinated\Shinobi\Traits\ShinobiTrait;

class Product extends Model
{
	use ShinobiTrait;
    protected $fillable=[
    	'type_id','name','min','status',
    ];
    public function type(){
    	return $this->belongsTo(Type::class);
    }
    public function kardexes(){
    	return $this->hasMany(Kardex::class);
    }

    //Scope
    public function scopeName($query,$name){
        if ($name) {
            return $query->where('name','LIKE',"%$name%");
        }
    }
}

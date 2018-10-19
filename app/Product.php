<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Caffeinated\Shinobi\Traits\ShinobiTrait;

class Product extends Model
{
	use ShinobiTrait;
    protected $fillable=[
    	'type_id','name','unidad','min','status',
    ];
    public function type(){
    	return $this->belongsTo(Type::class);
    }
    public function kardexes(){
    	return $this->hasMany(Kardex::class);
    }
}

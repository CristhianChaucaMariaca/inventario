<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Measure extends Model
{
    protected $fillable=[
    	'name','no',
    ];

    public function types(){
    	return $this->hasMany(Type::class);
    }
}

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
}

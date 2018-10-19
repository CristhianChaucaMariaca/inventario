<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Caffeinated\Shinobi\Traits\ShinobiTrait;

class Type extends Model
{
	use ShinobiTrait;
    protected $fillable=[
    	'name',
    ];
}

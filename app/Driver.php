<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    protected $fillable=
    [
    	'name','last_name','phone','address','ci','license','status',
    ];
}

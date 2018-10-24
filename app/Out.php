<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Out extends Model
{
	protected $fillable=
	[
		'kardex_id','cuantity','value'
	];
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class In extends Model
{
	protected $fillable=
	[
		'kardex_id','cuantity','value',
	];
    public function kardex()
    {
    	return $this->belongsTo(Kardex::class);
    }
}

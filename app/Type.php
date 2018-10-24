<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Caffeinated\Shinobi\Traits\ShinobiTrait;

class Type extends Model
{
	use ShinobiTrait;
    protected $fillable=[
    	'measure_id','name',
    ];

    public function measure(){
    	return $this->belongsTo(Measure::class);
    }
}

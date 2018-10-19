<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Caffeinated\Shinobi\Traits\ShinobiTrait;

class Buy extends Model
{
    use ShinobiTrait;
    protected $fillable =
    [
    	'user_id','provider_id','product_id','cuantity','cost','unitary','status',
    ];

    public function user(){
    	return $this->belongsTo(User::class);
    }
    public function provider(){
    	return $this->belongsTo(Provider::class);
    }
    public function product(){
    	return $this->belongsTo(Product::class);
    }
}

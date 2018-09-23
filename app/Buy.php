<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Buy extends Model
{
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

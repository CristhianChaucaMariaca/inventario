<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $fillable=[
    	'user_id','driver_id','product_id','cuantity','cost','unitary','status'
    ];
    public function driver(){
    	return $this->belongsTo(Driver::class);
    }
    public function user(){
    	return $this->belongsTo(User::class);
    }
    public function product(){
    	return $this->belongsTo(Product::class);
    }
}

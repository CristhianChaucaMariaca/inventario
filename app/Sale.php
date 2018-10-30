<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Caffeinated\Shinobi\Traits\ShinobiTrait;

class Sale extends Model
{
    use ShinobiTrait;
    protected $fillable=[
    	'user_id','driver_id','vehicle_id','product_id','cuantity','unitary','status'
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

    public function vehicle(){
        return $this->belongsTo(Vehicle::class);
    }
}

<?php

namespace App;

use Carbon\Carbon;

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

    public function kardex(){
        return $this->hasOne(Kardex::class);
    }

    public function scopeDate($query,$date){
        if ($date == 'today') {
            $d=Carbon::create()->format('Y-m-d');
            return $query->whereDate('created_at','=',$d);
        }elseif ($date=='month') {
            $y=Carbon::create()->format('Y');
            $m=Carbon::create()->format('m');
            return $query->whereYear('created_at','=',$y)
                ->whereMonth('created_at','=',$m);
        }
        elseif ($date=='year') {
            $y=Carbon::create()->format('Y');
            return $query->whereYear('created_at','=',$y);
        }elseif ($date=='') {
        }
    }
}

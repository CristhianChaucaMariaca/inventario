<?php

namespace App;

use Carbon\Carbon;

use Illuminate\Database\Eloquent\Model;
use Caffeinated\Shinobi\Traits\ShinobiTrait;

class Kardex extends Model
{
    use ShinobiTrait;
    protected $fillable=
    [
    	'user_id','product_id','sale_id','buy_id','balance','value','type',
    ];

    public function user(){
    	return $this->belongsTo(User::class);
    }
    public function product(){
        return $this->belongsTo(Product::class);
    }
    public function sale(){
    	return $this->belongsTo(Sale::class);
    }
    public function buy(){
    	return $this->belongsTo(Buy::class);
    }
    public function in(){
        return $this->hasOne(In::class);
    }
    public function output(){
        return $this->hasOne(Out::class);
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

    public function scopeProduct($query,$pro)
    {
        if ($pro) {
            return $query->where('product_id','=',$pro);
        }
    }
}

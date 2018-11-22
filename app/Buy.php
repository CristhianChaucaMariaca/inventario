<?php

namespace App;

use Carbon\Carbon;

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

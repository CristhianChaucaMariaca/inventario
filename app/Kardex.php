<?php

namespace App;

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
}

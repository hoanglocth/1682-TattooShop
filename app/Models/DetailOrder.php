<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailOrder extends Model
{
    use HasFactory;

    public function order(){
    	return $this->belongsTo(Order::class,'order_id');
    }

    public function tattoo(){
    	return $this->belongsTo(Tattoo::class,'tattoo_id');
    }
}

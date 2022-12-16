<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
    	'status'
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    
    public function orderdetail(){
        return $this->hasMany(DetailOrder::class, 'order_id', 'id');
    }
}
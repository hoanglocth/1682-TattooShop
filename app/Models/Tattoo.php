<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tattoo extends Model
{
    use HasFactory;

    protected $table = "tattoos";

    protected $fillable = [
    	'name', 'img','artist','price','describes','category_id', 'artist_id'
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function category(){
        return $this->hasOne(Category::class, 'id', 'category_id');
    }

    public function artists(){
        return $this->hasOne(Artist::class, 'id', 'artist_id');
    }

    public function ratings(){
        return $this->hasMany(Rating::class)->orderBy('created_at','DESC');
    }
}

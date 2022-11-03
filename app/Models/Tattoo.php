<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tattoo extends Model
{
    use HasFactory;

    protected $table = "tattoos";

    protected $fillable = [
    	'name', 'img','author','price','describes','category_id'
    ];


}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    protected $table = "ratings";

    protected $fillable = [
    	'user_id', 'tattoo_id', 'star_number', 'comment'
    ];

	public function user(){
		return $this->belongsTo(User::class);
	}

	public function tattoo()
    {
        return $this->belongsTo(Tattoo::class);
    }
}

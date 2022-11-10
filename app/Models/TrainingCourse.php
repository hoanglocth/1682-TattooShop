<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrainingCourse extends Model
{
    use HasFactory;
    protected $table = "training_courses";

    protected $fillable = [
    	'name', 'img', 'describes', 'from_date', 'to_date', 'schedule'
    ];
}

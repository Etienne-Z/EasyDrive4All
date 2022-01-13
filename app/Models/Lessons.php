<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class lessons extends Model
{
    use HasFactory;
    protected $fillable = [
        'User_ID',
        'Instructor_ID',
        'Pickup_address',
        'Pickup_city',
        'Starting_time',
        'Finishing_time',
        'Lesson_type',
        'Comment',
        'Exam',
        'Exam_success'
    ];
}

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

    public function instructor_has_users()
    {
        return $this->hasOne(instructor_has_users::class);
    }
    /**
     *
     * Scopes for filtering on student / instructor ID
     *
     */

    public function scopeStudent($query, $student){
        return $query->select()
        ->where('User_ID', '=', $student);
    }

    public function scopeInstructor($query, $instructor){
        return $query->select()
        ->where('Instructor_ID', '=', $instructor);
    }
}

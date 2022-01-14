<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class lessons extends Model
{
    use HasFactory;
    protected $fillable = [
        'Student_ID',
        'Instructor_ID',
        'Pickup_address',
        'Pickup_city',
        'Starting_time',
        'Finishing_time',
        'Lesson_type',
        'Result',
        'Comment',
        'Exam',
        'Exam_success'
    ];

    public function scopeStudent($query){
        return $query
        ->join('users', 'lessons.Student_ID', 'users.id');
    }

    public function scopeInstructor($query){
        return $query
        ->join('instructors', 'lessons.Instructor_ID', 'instructors.id')
        ->join('users', 'instructors.User_ID', 'users.id');
    }

    public function scopeLessonInformation($query){
        return $query
        ->select('users.first_name','lessons.pickup_address', 'lessons.pickup_city', 'lessons.starting_time', 'lessons.finishing_time', 'lessons.lesson_type','lessons.result', 'lessons.comment');
    }


    /**
     *
     * Scopes for filtering on student / instructor ID
     *
     */

    public function scopeWhereStudent($query, $student){
        return $query
        ->where('Student_ID', '=', $student);
    }

    public function scopeWhereInstructor($query, $instructor){
        return $query
        ->where('Instructor_ID', '=', $instructor);
    }
}

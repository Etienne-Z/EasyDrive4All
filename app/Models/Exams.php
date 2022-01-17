<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exams extends Model
{
    use HasFactory;
    protected $fillable = [
        'Exam_success'
    ];

    public function scopeExamCompleted($query){
        return $query->select('ID','Exam_success');
    }
}

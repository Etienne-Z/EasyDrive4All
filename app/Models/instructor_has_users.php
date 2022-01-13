<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class instructor_has_users extends Model
{
    use HasFactory;

    protected $fillable = [
        'User_ID',
        'Instructor_ID'
    ];

    public function scopePopular($query)
    {
        return $query->where('votes', '>', 100);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\instructors;

class instructor_has_users extends Model
{
    use HasFactory;

    protected $fillable = [
        'User_ID',
        'Instructor_ID'
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function instructor()
    {
        return $this->hasMany(instructors::class);
    }

    public function scopePopular($query)
    {
        return $query->where('votes', '>', 100);
    }

    public function scopeUser($query, $id){
        return $query->where('User_ID',$id);

    }
}

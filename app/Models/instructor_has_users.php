<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\instructors;
use Illuminate\Support\Facades\Auth;

class instructor_has_users extends Model
{

    protected $primaryKey = 'User_ID';

    use HasFactory;
    protected $fillable = [
        'User_ID',
        'Instructor_ID'
    ];

    public function users()
    {
        return $this->hasOne(User::class);
    }

    public function instructor()
    {
        return $this->hasMany(instructors::class);
    }

    public function scopeWhereUser($query, $id){
        return $query->where('User_ID', '=' , $id);
    }

    public function scopeUser($query, $id){
        return $query->where('User_ID', '=', $id);
    }

    public function scopeWhereInstructor($query){
        if(Auth::user()->instructor){
            return $query->where('Instructor_ID', '=', Auth::user()->instructor->id);
        }
    }

    public function scopeWhereInstructorId($query,$id){
        return $query->where('Instructor_ID', '=', $id);
    }


    public function scopeName($query){
        return $query
        ->join('users', 'instructor_has_users.User_ID', 'users.id')
        ->select('users.first_name', 'users.insertion', 'users.last_name', 'users.id', 'users.email');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class instructors extends Model
{
    use HasFactory;

        /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'User_ID'
    ];

    public function instructor_has_users()
    {
        return $this->hasOne(instructor_has_users::class);
    }

    public function scopeName($query){
        return $query
        ->join('users', 'instructors.User_ID', 'users.id')
        ->select('instructors.id', 'users.first_name', 'users.insertion', 'users.last_name');
    }

    public function scopeInstructors($query){
        return $query->select('Users')->where('Instructors.id','==','users.id');
    }
}

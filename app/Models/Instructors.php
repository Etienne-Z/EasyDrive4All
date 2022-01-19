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

    public function instructor_has_users(){
        return $this->hasMany(instructor_has_users::class);
    }
    public function user(){
        return $this->hasOne(User::class);
    }
}

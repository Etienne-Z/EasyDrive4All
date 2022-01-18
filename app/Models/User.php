<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\instructor_has_users;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'insertion',
        'last_name',
        'city',
        'address',
        'zipcode',
        'email',
        'sick',
        'lesson_hours',
        'role',
        'password'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function instructor(){
        return $this->hasOne(Instructors::class);
    }

    public function scopeWhereID($query, $id){
        return $query->where('users.id', '=', $id);
    }
    public function instructor_has_users()
    {
        return $this->hasOne(instructor_has_users::class);
    }

    /**
     *
     * Scopes for filtering on role
     *
     */

    public function scopeWhereStudent($query){
        return $query->where('users.role', '==', 0);
    }

    public function scopeWhereInstructor($query){
        return $query->where('users.role', '==', 1);
    }

    public function scopeWhereAdmin($query){
        return $query->where('users.role', '==', 2);
    }
}

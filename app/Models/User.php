<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

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


    /**
     *
     * Scopes for filtering on role
     *
     */

    public function scopeStudent($query){
        return $query->select()
        ->where('users.role', '==', 0);
    }

    public function scopeInstructor($query){
        return $query->select()
        ->where('users.role', '==', 1);
    }

    public function scopeAdmin($query){
        return $query->select()
        ->where('users.role', '==', 2);
    }
}

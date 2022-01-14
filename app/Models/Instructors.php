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

    //Nog niet gechecked of het werkt

    // public function students(){
    //     return $this->hasMany(User::class);
    // }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Announcements extends Model
{
    use HasFactory;
    protected $fillable = [
        'Role',
        'Title',
        'Description'
    ];

    public function scopeStudent($query){
        return $query->select()
        ->where('Announcements.role', '=', 0);
    }

    public function scopeInstructor($query){
        return $query->select()
        ->where('Announcements.role', '=', 1);
    }

    public function scopeId($query,$id){
        return $query->where('id'. '=', $id);
    }

}

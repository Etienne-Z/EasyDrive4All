<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cars extends Model
{
    use HasFactory;
    protected $fillable = [
        'Type',
        'Brand',
        'License_plate'
    ];

    public function scopeWhereId($query, $id){
        return $query
        ->where('cars.id', '=', $id);
    }
}

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

    public function scopeNotInstructor($query){
        return $query->select()
        ->where('users.role', '!=', 1);
    }

    public function scopeTest($query)
    {
        return $query->join('instructor_has_users', 'users.id', 'instructor_has_users.User_ID')
        ->select();

        // ->join('stores', 'products.Store_ID', 'stores.id')
        // ->join('user_carts', 'cart_items.User_cart_ID', 'user_carts.id')
        // ->select('stores.Store', 'cart_items.Amount', 'cart_items.product_id', 'products.Product_name', 'products.Product_image', 'products.Product_price', 'user_carts.Cart_name', 'user_carts.id');
    }
}

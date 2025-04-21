<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens;

    // Specify the attributes that can be mass assigned
    protected $fillable = [
        'name',          // User's name
        'email',         // User's email
        'password',      // User's password
        'role',          // User's role (e.g., "admin", "user", etc.)
    ];

    // Specify attributes that should be hidden from arrays or JSON responses
    protected $hidden = [
        'password',          // User's password for security reasons
        'remember_token',    // "Remember me" authentication token
    ];

    // Define the casting of specific attributes to desired data types
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime', // Cast "email_verified_at" to a DateTime object
            'password' => 'hashed',           // Cast "password" as a hashed value for security
        ];
    }

    // Define a one-to-many relationship with the "Order" model
    public function orders()
    {
        return $this->hasMany(Order::class); // A user can have multiple orders
    }

    public function isAdmin()
{
    return $this->role === 'admin'; // Check if the user's role is "admin"
}
}


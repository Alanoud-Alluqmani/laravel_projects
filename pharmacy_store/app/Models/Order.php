<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    
    // Specify attributes that can be mass assigned
    protected $fillable = ['user_id', 'total_price']; 
    // 'user_id': Foreign key linking to the user who made the order
    // 'total_price': Total price of the order

    // Define a many-to-one relationship with the "User" model
    public function user()
    {
        return $this->belongsTo(User::class); 
        // Each order belongs to a specific user
    }

    // Define a one-to-many relationship with the "OrderItem" model
    public function order_items()
    {
        return $this->hasMany(Order_item::class); 
        // An order can have multiple order items
    }

    // Define a one-to-many relationship with the "Invoice" model
    public function invoices()
    {
        return $this->hasMany(Invoice::class); 
        // An order can have multiple invoices
    }
}

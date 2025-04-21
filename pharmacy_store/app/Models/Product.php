<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    // Specify attributes that can be mass assigned
    protected $fillable = ['name', 'description', 'price', 'quantity']; 
    // 'name': Name of the product
    // 'description': Optional description of the product
    // 'price': Price of the product
    // 'quantity': Available quantity of the product

    // Define a one-to-many relationship with the "OrderItem" model
    public function order_items()
    {
       return $this->hasMany(Order_item::class); 
       // A product can appear in multiple order items
    }
}
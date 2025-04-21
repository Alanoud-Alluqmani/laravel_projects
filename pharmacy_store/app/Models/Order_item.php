<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order_item extends Model
{
    // Specify attributes that can be mass assigned
    protected $fillable = ['order_id', 'product_id', 'quantity', 'price']; 
    // 'order_id': Foreign key linking to the related order
    // 'product_id': Foreign key linking to the related product
    // 'quantity': Number of units of the product in this order item
    // 'price': Price of the product item

    // Define a many-to-one relationship with the "Order" model
    public function order()
    {
        return $this->belongsTo(Order::class); 
        // Each order item belongs to a specific order
    }

    // Define a many-to-one relationship with the "Product" model
    public function product()
    {
        return $this->belongsTo(Product::class); 
        // Each order item is linked to a specific product
    }
}
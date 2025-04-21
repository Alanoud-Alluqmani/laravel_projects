<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    // Specify attributes that can be mass assigned
    protected $fillable = ['order_id', 'total_price', 'payment_status']; 
    // 'order_id': Foreign key linking to the related order
    // 'total_price': Total price of the invoice
    // 'payment_status': Payment status (e.g., "pending", "paid")

    // Define a many-to-one relationship with the "Order" model
    public function order()
    {
        return $this->belongsTo(Order::class); 
        // Each invoice belongs to a specific order
    }
}
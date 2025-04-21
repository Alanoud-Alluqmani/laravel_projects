<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    // Method to define the database table structure
    public function up(): void
    {
        // Create the "order_items" table
        Schema::create('order_items', function (Blueprint $table) {
            $table->id(); // Primary key: order item ID 
            $table->foreignId('order_id')->constrained()->cascadeOnDelete();
             // Foreign key linking to the "orders" table
             // Adds constraints based on the "orders" table
            // Ensures deletion of the order also deletes associated items
            $table->foreignId('product_id')->constrained()->cascadeOnDelete(); 
            // Foreign key linking to the "products" table
            // Adds constraints based on the "products" table
            // Ensures deletion of the product also deletes associated items
            $table->integer('quantity')->default(1); // Quantity of the product in the order, default is 1
            $table->decimal('price', 8, 2); // Price of the product item with up to 8 digits and 2 decimal places
            $table->timestamps(); // Adds created_at and updated_at timestamps
        });
    }

    // Method to rollback the migration
    public function down(): void
    {
        Schema::dropIfExists('order_items'); // Removes the "order_items" table if it exists
    }
};
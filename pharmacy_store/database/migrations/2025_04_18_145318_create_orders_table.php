<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    // Method to define the database table structure
    public function up(): void
    {
        // Create the "orders" table
        Schema::create('orders', function (Blueprint $table) {
            $table->id(); // Primary key: order ID
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            // Foreign key linking to the "users" table
            // Adds constraints based on the "users" table
            // Ensures deletion of user also deletes associated orders
            $table->decimal('total_price', 10, 2)->default(0); // Stores the total price with precision
            $table->timestamps(); // Adds created_at and updated_at timestamps
        });
    }

    // Method to rollback the migration
    public function down(): void
    {
        Schema::dropIfExists('orders'); // Removes the "orders" table if it exists
    }
};
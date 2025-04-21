<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    // Method to define the database table structure
    public function up(): void
    {
        // Create the "invoices" table
        Schema::create('invoices', function (Blueprint $table) {
            $table->id(); // Primary key: invoice ID
            $table->foreignId('order_id')->constrained()->cascadeOnDelete(); 
            // Foreign key linking to the "orders" table
            // Adds constraints based on the "orders" table
            // Ensures deletion of an order also deletes related invoices
            $table->decimal('total_price', 10, 2); // Total price with up to 10 digits and 2 decimal places
            $table->string('payment_status')->default('pending'); // Payment status with a default value of "pending"
            $table->timestamps(); // Adds created_at and updated_at timestamps
        });
    }

    // Method to rollback the migration
    public function down(): void
    {
        Schema::dropIfExists('invoices'); // Removes the "invoices" table if it exists
    }
};



            
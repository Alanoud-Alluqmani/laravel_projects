<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    // Method to define the database table structure
    public function up(): void
    {
        // Create the "products" table
        Schema::create('products', function (Blueprint $table) {
            $table->id(); // Primary key: product ID
            $table->string('name'); // Product name
            $table->text('description')->nullable(); // Optional product description
            $table->decimal('price', 8, 2); // Product price with up to 8 digits and 2 decimal places
            $table->integer('quantity')->default(0); // Product quantity with a default value of 0
            $table->timestamps(); // Adds created_at and updated_at timestamps
        });
    }

    // Method to rollback the migration
    public function down(): void
    {
        Schema::dropIfExists('products'); // Removes the "products" table if it exists
    }
};
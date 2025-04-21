<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    // This method runs when the migration is executed
    public function up(): void
    {
        // Creating the "users" table
        Schema::create('users', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('name'); // User's name
            $table->string('email')->unique(); // User's unique email address
            $table->string('password'); // User's password
            $table->string('role')->default('user'); // User's role, default is "user"
            $table->rememberToken(); // Token for "remember me" functionality
            $table->timestamps(); // Tracks created and updated timestamps
        });

        // Creating the "password_reset_tokens" table
        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary(); // Primary key: email
            $table->string('token'); // Token for password reset
            $table->timestamp('created_at')->nullable(); // Optional creation timestamp
        });

        // Creating the "sessions" table
        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary(); // Primary key: session ID
            $table->foreignId('user_id')->nullable()->index(); // Links session to user, optional
            $table->string('ip_address', 45)->nullable(); // IP address of the user
            $table->text('user_agent')->nullable(); // User's device/browser info
            $table->longText('payload'); // Session data
            $table->integer('last_activity')->index(); // Tracks last activity timestamp
        });
    }

    // This method runs when the migration is rolled back
    public function down(): void
    {
        Schema::dropIfExists('users'); // Drops "users" table
        Schema::dropIfExists('password_reset_tokens'); // Drops "password_reset_tokens" table
        Schema::dropIfExists('sessions'); // Drops "sessions" table
    }
};
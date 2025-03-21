<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('donations', function (Blueprint $table) {
            $table->id();
            $table->string('donor_name', 200)->nullable(); // For named donations, nullable for anonymous
            $table->string('email', 100)->nullable(); // Optional for anonymous donations
            $table->decimal('amount', 10, 2); // Donation amount
            $table->string('payment_method', 50); // Payment method (e.g., PayPal, Credit Card)
            $table->boolean('is_anonymous')->default(false); // If true, hide donor identity
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('donations');
    }
};

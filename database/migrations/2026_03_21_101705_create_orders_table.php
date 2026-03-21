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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();

         $table->foreignId('user_id')->constrained()->onDelete('cascade');
        $table->string('order_number')->unique();
       $table->string('name');
        $table->string('email');
        $table->string('phone');
        $table->text('address');
        $table->string('city');
        $table->string('payment_method')->default('cod'); // cod, bkash, ssl
        $table->string('payment_status')->default('pending');
        $table->string('order_status')->default('pending');
        $table->decimal('total_amount', 10, 2);


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};

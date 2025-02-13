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
        Schema::create('order_masters', function (Blueprint $table) {
            $table->id();
            $table->integer('userId');
            $table->timestamp('orderDate');
            $table->integer('total_order_amt');
            $table->integer('dis_amt_point');
            $table->integer('total_bill_amt');
            $table->integer('delivery_slot_id');
            $table->string('order_status');
            $table->integer('shipping_id');
            $table->enum('payment_mode',['cash','online'])->default('online');
            $table->enum('status', ['active', 'deactive','deleted'])->default('active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_masters');
    }
};

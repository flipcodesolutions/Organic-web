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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('productName');
            $table->string('productNameGuj');
            $table->string('productNameHin');
            $table->mediumtext('productDescription');
            $table->mediumtext('productDescriptionGuj');
            $table->mediumtext('productDescriptionHin');
            $table->string('productPrice');
            $table->integer('categoryId');
            $table->integer('userId');
            $table->string('stock');
            $table->string('image')->nullable();
            $table->string('season');
            $table->integer('brandId');
            $table->enum('isOnHome', ['yes', 'no'])->default('no');
            $table->enum('status', ['active', 'deactive'])->default('active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};

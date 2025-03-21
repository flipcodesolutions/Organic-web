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
        Schema::create('meta_property_categories', function (Blueprint $table) {
            $table->id();
            $table->integer('categoryId')->nullable();
            $table->string('ogTitleEng')->nullable();
            $table->string('ogTitleGuj')->nullable();
            $table->string('ogTitleHin')->nullable();
            $table->string('ogDescriptionEng')->nullable();
            $table->string('ogDescriptionGuj')->nullable();
            $table->string('ogDescriptionHin')->nullable();
            $table->string('ogImage')->nullable();
            $table->string('ogUrl')->nullable();
            $table->string('description')->nullable();
            $table->string('keywords')->nullable();
            $table->string('author')->nullable();
            $table->string('tages')->nullable();
            $table->enum('status', ['Yes', 'No']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('meta_property_categories');
    }
};

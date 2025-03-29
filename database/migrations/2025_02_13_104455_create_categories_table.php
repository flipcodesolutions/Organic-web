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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('categoryName');
            $table->string('categoryNameGuj');
            $table->string('categoryNameHin');
            $table->mediumtext('categoryDescription');
            $table->mediumtext('categoryDescriptionGuj');
            $table->mediumtext('categoryDescriptionHin');
            $table->string('cat_icon');
            $table->string('parent_category_id');
            $table->enum('status', ['active', 'deactive'])->default('active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};

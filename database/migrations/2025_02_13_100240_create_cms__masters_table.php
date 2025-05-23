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
        Schema::create('cms__masters', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('titleGuj');
            $table->string('titleHin');
            $table->string('slug');
            $table->mediumtext('description');
            $table->mediumtext('descriptionGuj');
            $table->mediumtext('descriptionHin');
            $table->enum('status', ['active', 'deactive','deleted'])->default('active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cms__masters');
    }
};

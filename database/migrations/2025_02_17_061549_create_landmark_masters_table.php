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
        Schema::create('landmark_masters', function (Blueprint $table) {
            $table->id();
            $table->integer('city_id');
            $table->string('landmark_eng', 255);
            $table->string('landmark_hin', 255);
            $table->string('landmark_guj', 255);
            $table->decimal('latitude', 10, 7);
            $table->decimal('longitude', 10, 7);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('landmark_masters');
    }
};

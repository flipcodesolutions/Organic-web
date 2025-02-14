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
        Schema::create('city_masters', function (Blueprint $table) {
            $table->id();
            $table->string('city_name_eng', 255);
            $table->string('city_name_hin', 255);
            $table->string('city_name_guj', 255);
            $table->string('pincode', 10);
            $table->string('area_eng', 255);
            $table->string('area_hin', 255);
            $table->string('area_guj', 255);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('city_masters');
    }
};

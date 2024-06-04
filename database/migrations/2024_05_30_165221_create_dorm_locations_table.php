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
        Schema::create('dorm_locations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('dorm_id');
            $table->unsignedBigInteger('location_id');
            $table->foreign('dorm_id')->references('id')->on('dorms')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('location_id')->references('id')->on('locations')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dorm_locations');
    }
};

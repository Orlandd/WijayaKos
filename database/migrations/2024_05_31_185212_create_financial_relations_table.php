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
        Schema::create('financial_relations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('finance_id');
            $table->unsignedBigInteger('financial_type_id');
            $table->foreign('finance_id')->references('id')->on('finances')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('financial_type_id')->references('id')->on('financial_types')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('financial_relations');
    }
};

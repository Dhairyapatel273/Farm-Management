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
        Schema::create('total_sales', function (Blueprint $table) {
            $table->id();
            $table->foreignId('plant_id')->constrained('master_plants')->onUpdate('cascade')->onDelete('cascade');
            $table->string('broker_name', 50);
            $table->string('kgs', 50);
            $table->string('rate', 50);
            $table->string('total', 50);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('total_sales');
    }
};

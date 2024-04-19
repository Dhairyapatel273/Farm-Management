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
        Schema::create('fertigations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('plant_id')->constrained('master_plants')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('fertilizer_id')->constrained('master_fertilizers')->onUpdate('cascade')->onDelete('cascade');
            $table->string('area', 50);
            $table->date('date_of_fertigation');
            $table->string('fertilizer_used_in_kgs', 10);
            $table->string('total_area', 50);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fertigations');
    }
};

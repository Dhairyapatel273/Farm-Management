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
        Schema::create('sprays', function (Blueprint $table) {
            $table->id();
            $table->foreignId('plant_id')->constrained('master_plants')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('insecticide_id')->constrained('master_insecticides')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('fungicide_id')->constrained('master_fungicides')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('fertilizer_id')->constrained('master_fertilizers')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('pgr_id')->constrained('master_pgrs')->onUpdate('cascade')->onDelete('cascade');
            $table->string('pump', 50);
            $table->string('ltrs', 50);
            $table->string('area', 50);
            $table->date('date', 50);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sprays');
    }
};

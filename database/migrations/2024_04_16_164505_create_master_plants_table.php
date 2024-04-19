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
        Schema::create('master_plants', function (Blueprint $table) {
            $table->id();
            $table->foreignId('crop_id')->constrained('master_crops')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('user_id')->constrained('users')->onUpdate('cascade')->onDelete('cascade');
            $table->string('company', 50);
            $table->string('variety', 50);
            $table->datetime('date_of_plantaion');
            $table->string('location', 50);
            $table->string('area', 50);
            $table->string('reviews', 50);
            $table->string('days_of_reminder', 50);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('master_plants');
    }
};

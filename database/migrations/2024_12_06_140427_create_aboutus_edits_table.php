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
        Schema::create('aboutus_edits', function (Blueprint $table) {
            $table->id();
            $table->json('journey_heading'); 
            $table->string('journey_img'); 
            $table->json('vision_heading'); 
            $table->json('vision_desc');
            $table->string('vision_img'); 
            $table->timestamps(); 
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aboutus_edits');
    }
};

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
            $table->string('journey_heading'); // Column for journey heading
            $table->string('journey_img'); // Column for journey image
            $table->string('vision_heading'); // Column for vision heading
            $table->text('vision_desc'); // Column for vision description
            $table->string('vision_img'); // Column for vision image
            $table->timestamps(); // Created and updated timestamps
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

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
        Schema::table('aboutus_edits', function (Blueprint $table) {
            $table->json('journey_heading')->change(); 
            $table->json('vision_heading')->change(); 
            $table->json('vision_desc')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('aboutus_edits', function (Blueprint $table) {
            //
        });
    }
};

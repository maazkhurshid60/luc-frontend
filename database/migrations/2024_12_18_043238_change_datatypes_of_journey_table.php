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
        Schema::table('journeys', function (Blueprint $table) {
            $table->json('month')->nullable()->change(); 
            $table->json('title')->change();
            $table->json('description')->nullable()->change(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('journeys', function (Blueprint $table) {
            $table->string('month')->nullable(); 
            $table->string('title');
            $table->text('description')->nullable(); 
        });
    }
};

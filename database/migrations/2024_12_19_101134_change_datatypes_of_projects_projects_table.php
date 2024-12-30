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
        Schema::table('projects', function (Blueprint $table) {
            $table->json('name')->nullable()->change();
            $table->json('contents')->nullable()->change();
            $table->json('description')->nullable()->change();
            $table->json('section_data')->nullable()->change();
            $table->json('page_title')->nullable()->change();
            $table->json('meta_keywords')->nullable()->change();
            $table->json('meta_description')->nullable()->change();
            $table->json('og_title')->nullable()->change();
            $table->json('og_description')->nullable()->change();
            $table->json('og_type')->nullable()->change();
            $table->json('sector')->nullable()->change(); 
            $table->json('country')->nullable()->change(); 
            $table->json('industry')->nullable()->change(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            
        });
    }
};

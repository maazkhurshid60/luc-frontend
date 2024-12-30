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
        Schema::table('menu', function (Blueprint $table) {
            $table->json('name')->nullable()->change();
            $table->json('heading')->nullable()->change();
            $table->json('short_description')->nullable()->change();
            $table->json('description')->nullable()->change();
            $table->json('about_description')->nullable()->change();

            $table->json('page_title')->nullable()->change();
            $table->json('meta_keywords')->nullable()->change();
            $table->json('meta_description')->nullable()->change();

            $table->json('og_title')->nullable()->change();
            $table->json('og_description')->nullable()->change();
            $table->json('og_type')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('menu', function (Blueprint $table) {
            $table->string('name')->nullable();
            $table->text('heading')->nullable();
            $table->text('short_description')->nullable();
            $table->text('description')->nullable();
            $table->text('about_description')->nullable();
            
            $table->string('page_title')->nullable();
            $table->text('meta_keywords')->nullable();
            $table->string('meta_description')->nullable();

            $table->string('og_title')->nullable();
            $table->string('og_description')->nullable();
            $table->string('og_type')->nullable();
        });
    }
};

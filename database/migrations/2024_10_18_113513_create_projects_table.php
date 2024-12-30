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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->json('name')->nullable();
            $table->string('slug')->nullable();
            $table->json('contents')->nullable();
            $table->json('description')->nullable();
            $table->string('link')->nullable();
            $table->string('color_code')->nullable();
            $table->enum('status', ['active', 'in-active'])->default('active');
            $table->string('cover_image')->nullable();
            $table->string('detials_image')->nullable();
            $table->json('gallery_images')->nullable();

            $table->string('client')->nullable();
            $table->string('services')->nullable();
            $table->bigInteger('category_id')->nullable();
            $table->json('categories_id')->nullable();
            $table->date('date')->nullable();

            $table->boolean('search_engine')->nullable();
            $table->integer('display_order')->nullable();
            $table->boolean('site_visibility')->nullable();
            $table->json('section_data')->nullable();

            $table->json('page_title')->nullable();
            $table->json('meta_keywords')->nullable();
            $table->json('meta_description')->nullable();

            $table->json('og_title')->nullable();
            $table->json('og_description')->nullable();
            $table->string('og_image')->nullable();
            $table->json('og_type')->nullable();

            $table->json('sector')->nullable(); 
            $table->json('country')->nullable(); 
            $table->json('industry')->nullable(); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};

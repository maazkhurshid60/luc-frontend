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
            $table->string('name')->nullable();
            $table->string('slug')->nullable();
            $table->longText('contents')->nullable();
            $table->text('description')->nullable();
            $table->string('link')->nullable();
            $table->string('color_code')->nullable();
            $table->enum('status', ['active', 'in-active'])->default('active');
            $table->string('image')->nullable();
            $table->string('image2')->nullable();
            $table->string('header_image')->nullable();

            $table->string('client')->nullable();
            $table->string('services')->nullable();
            $table->json('category_id')->nullable();
            $table->bigInteger('categories_id')->nullable();

            $table->boolean('search_engine')->nullable();
            $table->integer('display_order')->nullable();
            $table->boolean('site_visibility')->nullable();

            $table->string('page_title')->nullable();
            $table->text('meta_keywords')->nullable();
            $table->string('meta_description')->nullable();

            $table->string('og_title')->nullable();
            $table->string('og_description')->nullable();
            $table->string('og_image')->nullable();
            $table->string('og_type')->nullable();
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

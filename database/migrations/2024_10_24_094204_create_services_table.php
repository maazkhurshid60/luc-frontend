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
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->json('title')->nullable();
            $table->text('slug')->nullable();
            $table->string('icon')->nullable();
            $table->json('description')->nullable();
            $table->json('contents')->nullable();
            $table->bigInteger('projectcategory')->nullable();
            $table->boolean('is_featured')->nullable();
            $table->json('featured_projects')->nullable();

            $table->longText('file')->nullable();
            $table->string('file2')->nullable();
            $table->string('file4')->nullable();
            $table->string('banner')->nullable();
            $table->string('bg_color')->nullable();
            $table->string('second_image')->nullable();
            $table->enum('status', ['active', 'in-active'])->default('active');
            $table->bigInteger('company_id')->nullable();
            $table->string('position')->nullable();
            $table->integer('display_order')->nullable();
            $table->boolean('search_engine')->nullable();
            $table->json('seo_more_heading')->nullable();
            $table->json('seo_more_content')->nullable();

            $table->json('page_title')->nullable();
            $table->json('meta_keywords')->nullable();
            $table->json('meta_description')->nullable();

            $table->json('og_title')->nullable();
            $table->json('og_description')->nullable();
            $table->string('og_image')->nullable();
            $table->json('og_type')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};

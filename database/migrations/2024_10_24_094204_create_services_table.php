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
            $table->string('title')->nullable();
            $table->text('slug')->nullable();
            $table->string('icon')->nullable();
            $table->string('description')->nullable();
            $table->longText('contents')->nullable();
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

            $table->string('position')->nullable();
            $table->integer('display_order')->nullable();
            $table->boolean('search_engine')->nullable();
            $table->string('seo_more_heading')->nullable();
            $table->text('seo_more_content')->nullable();

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
        Schema::dropIfExists('services');
    }
};

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
        Schema::create('menu', function (Blueprint $table) {
            $table->id();
            $table->json('name')->nullable();
            $table->string('slug')->nullable();
            $table->json('heading')->nullable();
            $table->json('short_description')->nullable();
            $table->json('description')->nullable();
            $table->string('image')->nullable();
            $table->string('video')->nullable();

            $table->bigInteger('parent')->nullable();
            $table->string('position')->nullable();

            $table->enum('display', ['yes', 'no'])->default('yes');
            $table->enum('show_services', ['1', '0'])->default('0');
            $table->json('about_description')->nullable();
            $table->string('about_img')->nullable();
            
            $table->integer('display_order')->nullable();
            $table->boolean('search_engine')->nullable();

            $table->json('page_title')->nullable();
            $table->json('meta_keywords')->nullable();
            $table->json('meta_description')->nullable();

            $table->json('og_title')->nullable();
            $table->json('og_description')->nullable();
            $table->json('og_image')->nullable();
            $table->json('og_type')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menu');
    }
};

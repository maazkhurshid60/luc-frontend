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
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->json('title')->nullable();
            $table->string('slug')->nullable();
            $table->json('short_description')->nullable();
            $table->json('contents')->nullable();
            $table->string('user')->nullable();
            $table->string('image')->nullable();
            $table->string('cover_image')->nullable();

            $table->bigInteger('category_id')->nullable();
            $table->json('service_id')->nullable();
            $table->mediumText('tags')->nullable();
            $table->date('date')->nullable();
            $table->enum('status', ['active', 'in-active'])->default('active');

            $table->json('page_title')->nullable();
            $table->json('meta_keywords')->nullable();
            $table->json('meta_description')->nullable();

            $table->boolean('search_engine')->nullable();
            $table->integer('display_order')->nullable();
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
        Schema::dropIfExists('blogs');
    }
};

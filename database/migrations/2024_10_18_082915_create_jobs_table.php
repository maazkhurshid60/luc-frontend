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
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->json('title')->nullable();
            $table->string('slug')->nullable();
            $table->json('contents')->nullable();
            $table->json('location')->nullable();
            $table->json('type')->nullable();
            $table->json('job_type')->nullable();
            $table->json('department')->nullable();
            $table->string('salary')->nullable();
            $table->string('positions')->nullable();
            $table->json('level')->nullable();
            $table->json('experience')->nullable();
            $table->json('education')->nullable();
            $table->date('apply_before')->nullable();
            $table->enum('status', ['active', 'in-active'])->default('active');

            $table->biginteger('category_id')->nullable();
            $table->string('file')->nullable();
            $table->string('header_image')->nullable();

            $table->boolean('search_engine')->nullable();
            $table->integer('display_order')->nullable();

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
        Schema::dropIfExists('jobs');
    }
};

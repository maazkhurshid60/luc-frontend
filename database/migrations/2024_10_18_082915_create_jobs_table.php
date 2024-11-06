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
            $table->string('title')->nullable();
            $table->string('slug')->nullable();
            $table->longText('contents')->nullable();
            $table->string('location')->nullable();
            $table->string('type')->nullable();
            $table->string('job_type')->nullable();
            $table->string('department')->nullable();
            $table->string('salary')->nullable();
            $table->string('positions')->nullable();
            $table->string('level')->nullable();
            $table->string('experience')->nullable();
            $table->string('education')->nullable();
            $table->date('apply_before')->nullable();
            $table->enum('status', ['active', 'in-active'])->default('active');

            $table->biginteger('category_id')->nullable();
            $table->string('file')->nullable();
            $table->string('header_image')->nullable();

            $table->boolean('search_engine')->nullable();
            $table->integer('display_order')->nullable();

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
        Schema::dropIfExists('jobs');
    }
};

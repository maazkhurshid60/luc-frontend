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
        Schema::create('case_studies', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('slug')->nullable();
            $table->text('short_description')->nullable();
            $table->longText('contents')->nullable();
            $table->string('user')->nullable();
            $table->string('image')->nullable();
            $table->text('breadcrumb')->nullable();
            $table->string('cover_image')->nullable();

            $table->bigInteger('category_id')->nullable();
            $table->json('service_id')->nullable();
            $table->json('pro_id')->nullable();
            $table->mediumText('tags')->nullable();
            $table->date('date')->nullable();
            $table->enum('status', ['active', 'in-active'])->default('active');

            $table->string('page_title')->nullable();
            $table->text('meta_keywords')->nullable();
            $table->string('meta_description')->nullable();

            $table->boolean('search_engine')->nullable();
            $table->integer('display_order')->nullable();
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
        Schema::dropIfExists('case_studies');
    }
};

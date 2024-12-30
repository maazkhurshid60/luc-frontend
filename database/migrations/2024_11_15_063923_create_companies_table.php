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
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->json('short_description')->nullable();
            $table->string('company_email')->nullable();
            $table->string('contact')->nullable();
            $table->string('image')->nullable();
            $table->string('companyIcon')->nullable();
            $table->json('address')->nullable();
            $table->json('address_2')->nullable();
            $table->json('contents')->nullable();
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('instagram')->nullable();
            $table->string('linkedin')->nullable();

            $table->enum('status', ['active', 'in-active'])->default('active');
            $table->boolean('search_engine')->nullable();
            $table->integer('display_order')->nullable();

            $table->json('page_title')->nullable();
            $table->json('meta_keywords')->nullable();
            $table->json('meta_description')->nullable();

            $table->json('og_title')->nullable();
            $table->json('og_description')->nullable();
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
        Schema::dropIfExists('companies');
    }
};

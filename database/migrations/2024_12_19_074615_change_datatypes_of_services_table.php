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
        Schema::table('services', function (Blueprint $table) {
            $table->json('title')->nullable()->change();
            $table->json('description')->nullable()->change();
            $table->json('contents')->nullable()->change();
            $table->json('seo_more_heading')->nullable()->change();
            $table->json('seo_more_content')->nullable()->change();
            $table->json('page_title')->nullable()->change();
            $table->json('meta_keywords')->nullable()->change();
            $table->json('meta_description')->nullable()->change();
            $table->json('og_title')->nullable()->change();
            $table->json('og_description')->nullable()->change();
            $table->json('og_type')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('services', function (Blueprint $table) {
            $table->string('title')->nullable();
            $table->string('description')->nullable();
            $table->longText('contents')->nullable();
            $table->string('seo_more_heading')->nullable();
            $table->text('seo_more_content')->nullable();

            $table->string('page_title')->nullable();
            $table->text('meta_keywords')->nullable();
            $table->string('meta_description')->nullable();
            $table->string('og_title')->nullable();
            $table->string('og_description')->nullable();
            $table->string('og_type')->nullable();
        });
    }
};

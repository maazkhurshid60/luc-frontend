<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::table('blogs')->truncate();
        Schema::table('blogs', function (Blueprint $table) {
            // Change column types
            $table->json('title')->nullable()->change();
            $table->json('short_description')->nullable()->change();
            $table->json('contents')->nullable()->change();
            $table->json('breadcrumb')->nullable()->change();
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
        Schema::table('blogs', function (Blueprint $table) {
            // Revert column types if needed
            $table->string('title')->nullable()->change();
            $table->text('short_description')->nullable()->change();
            $table->longText('contents')->nullable()->change();
            $table->text('breadcrumb')->nullable()->change();
            $table->string('page_title')->nullable()->change();
            $table->text('meta_keywords')->nullable()->change();
            $table->string('meta_description')->nullable()->change();
            $table->string('og_title')->nullable()->change();
            $table->string('og_description')->nullable()->change();
            $table->string('og_type')->nullable()->change();
        });
    }
};

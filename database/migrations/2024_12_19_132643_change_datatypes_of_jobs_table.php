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
        Schema::table('jobs', function (Blueprint $table) {
            $table->json('title')->nullable()->change();
            $table->json('contents')->nullable()->change();
            $table->json('location')->nullable()->change();
            $table->json('type')->nullable()->change();
            $table->json('job_type')->nullable()->change();
            $table->json('department')->nullable()->change();
            $table->json('level')->nullable()->change();
            $table->json('experience')->nullable()->change();
            $table->json('education')->nullable()->change();
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
        Schema::table('jobs', function (Blueprint $table) {
            //
        });
    }
};

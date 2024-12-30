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
        Schema::table('companies', function (Blueprint $table) {
            $table->json('short_description')->nullable()->change();
            $table->json('address')->nullable()->change();
            $table->json('address_2')->nullable()->change();
            $table->json('contents')->nullable()->change();
            $table->json('page_title')->nullable()->change();
            $table->json('meta_keywords')->nullable()->change();
            $table->json('meta_description')->nullable()->change();
            $table->json('og_title')->nullable()->change();
            $table->json('og_description')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('companies', function (Blueprint $table) {
            //
        });
    }
};

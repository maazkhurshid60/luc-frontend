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
        Schema::create('team', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->text('slug')->nullable();
            $table->string('description')->nullable();
            $table->string('designation')->nullable();
            $table->string('short_designation')->nullable();
            $table->string('hourly_rate')->nullable();
            $table->text('consultation_link')->nullable();
            $table->string('success_rate')->nullable();
            $table->longText('details')->nullable();

            $table->string('image')->nullable();
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('instagram')->nullable();
            $table->string('mail')->nullable();
            $table->boolean('enable_fix')->nullable();
            $table->enum('status', ['active', 'in-active'])->default('active');
            $table->string('tool_label')->nullable();
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
        Schema::dropIfExists('team');
    }
};

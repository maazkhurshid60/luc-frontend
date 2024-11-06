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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('siteName')->nullable();
            $table->string('slogan')->nullable();
            $table->string('logo')->nullable();
            $table->string('icon')->nullable();

            $table->string('phone')->nullable();
            $table->string('phone2')->nullable();
            $table->string('email')->nullable();
            $table->string('email2')->nullable();
            $table->text('address')->nullable();
            $table->string('address2')->nullable();
            $table->string('timmings')->nullable();
            $table->longText('map')->nullable();
            $table->longText('video')->nullable();
            $table->longText('about_us')->nullable();

            $table->string('twitter')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('fb')->nullable();
            $table->string('youtube')->nullable();
            $table->string('instagram')->nullable();
            $table->string('googleplus')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};

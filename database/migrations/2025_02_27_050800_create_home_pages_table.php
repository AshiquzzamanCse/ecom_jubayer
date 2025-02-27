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
        Schema::create('home_pages', function (Blueprint $table) {
            $table->id();

            $table->string('homepage_banner_one_image')->nullable();
            $table->string('homepage_banner_one_title')->nullable();
            $table->string('homepage_banner_one_badge')->nullable();
            $table->string('homepage_banner_one_url')->nullable();

            $table->string('homepage_banner_two_image')->nullable();
            $table->string('homepage_banner_two_title')->nullable();
            $table->string('homepage_banner_two_badge')->nullable();
            $table->string('homepage_banner_two_url')->nullable();

            $table->string('homepage_feature_one')->nullable();
            $table->string('homepage_feature_two')->nullable();
            $table->string('homepage_feature_three')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('home_pages');
    }
};

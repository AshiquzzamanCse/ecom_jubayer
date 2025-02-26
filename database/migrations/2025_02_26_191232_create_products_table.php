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
        Schema::create('products', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('brand_id')->nullable();
            $table->foreign('brand_id')->references('id')->on('brands')->onDelete('cascade');

            $table->unsignedBigInteger('category_id')->nullable();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');

            $table->unsignedBigInteger('subcategory_id')->nullable();
            $table->foreign('subcategory_id')->references('id')->on('sub_categories')->onDelete('cascade');

            $table->string('name')->nullable();
            $table->string('slug')->unique()->nullable();
            $table->string('image')->nullable();
            $table->text('short_descp')->nullable();
            $table->longText('long_descp')->nullable();
            $table->longText('specification')->nullable();
            $table->longText('assecrioes')->nullable();

            $table->string('code');
            $table->string('qty');

            $table->string('selling_price');
            $table->string('discount_price')->nullable();

            $table->string('size')->nullable();
            $table->string('color')->nullable();
            $table->string('stock')->nullable();

            $table->integer('hot_deal')->nullable();
            $table->integer('featured')->nullable();
            $table->integer('best_seeling')->nullable();
            $table->integer('new')->nullable();

            $table->string('status')->default('active');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};

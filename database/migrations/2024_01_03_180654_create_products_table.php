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
            $table->string('title')->unique();
            $table->text('slug')->nullable();
            $table->integer('brand_id')->nullable();
            $table->integer('category_id')->nullable();
            $table->integer('subCategory_id')->nullable();
            $table->text('short_details')->nullable();
            $table->text('long_details')->nullable();
            $table->unsignedInteger('regular_price')->default(1);
            $table->unsignedInteger('offer_price')->nullable();
            $table->unsignedInteger('quantity')->default(0);
            $table->text('sku_code')->nullable();
            $table->text('video_link')->nullable();
            $table->integer('is_featured')->default(0);
            $table->integer('status')->default(1);
            $table->text('tags')->nullable();
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

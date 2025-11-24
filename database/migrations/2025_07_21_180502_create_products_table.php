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
            $table->string('sku',20);
            $table->tinyInteger('supplier_id')->nullable();
            $table->tinyInteger('distributor_id')->nullable();
            $table->tinyInteger('brand_id')->nullable();
            $table->tinyInteger('country')->nullable();
            $table->string('title',300);
            $table->string('shortDescription');
            $table->longText('description')->nullable();
            $table->longText('imageUrls')->nullable();
            $table->tinyInteger('condition');
            $table->longText('conditionDescription')->nullable();
            $table->integer('quantity')->default(0);
            $table->boolean('is_substitute')->default(0);
            $table->integer('wholesale_price')->nullable();
            $table->integer('retail_price')->nullable();
            $table->integer('extra_charges')->nullable();
            $table->integer('total_price')->nullable();
            $table->integer('discounted_price')->nullable();
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

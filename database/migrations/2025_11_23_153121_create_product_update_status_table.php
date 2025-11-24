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
        Schema::create('product_update_status', function (Blueprint $table) {
            $table->id();
            $table->integer('status_code');
            $table->string('sku');
            $table->string('locale');
            $table->string('warnings');
            $table->string('errors');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_update_status');
    }
};

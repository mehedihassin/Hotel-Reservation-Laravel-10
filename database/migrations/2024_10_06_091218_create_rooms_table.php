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
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->string('room_title')->nullable();
            $table->string('description')->nullable();
            $table->decimal('regular_price');
            $table->decimal('discount_price')->nullable();
            $table->string('room_status')->default('available');
            $table->string('room_type')->default('couple');
            $table->string('wifi')->default('yes');
            $table->string('food')->default('yes');
            $table->string('image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rooms');
    }
};

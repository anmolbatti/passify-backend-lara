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
        Schema::create('pass_images', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pass_id');
            $table->foreign('pass_id')->on('passes')->references('id')->cascadeOnDelete();
            $table->string('stamp_earned');
            $table->longText('image');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pass_images');
    }
};

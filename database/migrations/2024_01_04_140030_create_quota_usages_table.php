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
        Schema::create('quota_usages', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('vendor_id');
            $table->foreign('vendor_id')->on('users')->references('id')->cascadeOnDelete();

            // quota type must be the column name in plans table
            $table->enum('quota_type',[
                'card_design_count',
                'location_count',
                'user_count',
                'card_redesign_annual_count'
            ]);

            $table->integer('usage');
            $table->boolean('status')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quota_usages');
    }
};

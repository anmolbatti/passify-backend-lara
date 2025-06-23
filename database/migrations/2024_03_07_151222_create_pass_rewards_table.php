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
        Schema::create('pass_rewards', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pass_id')->nullable();
            $table->foreign('pass_id')->references('id')->on('passes');
            $table->string('reward_name')->nullable();
            $table->string('reward_description')->nullable();
            $table->string('stamp_success_message')->nullable();
            $table->string('reward_success_message')->nullable();
            $table->integer('stamp_no')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pass_rewards');
    }
};

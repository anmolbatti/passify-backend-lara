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
        Schema::create('plans', function (Blueprint $table) {
            $table->id();
            $table->string('plan_name');
            $table->decimal('price');
            $table->string('currency_symbol');
            $table->enum('plan_type',['annual','monthly']);
            $table->integer('trial_period_in_days');
            $table->integer('card_design_count')->nullable();
            $table->integer('location_count')->nullable();
            $table->integer('user_count')->nullable();
            $table->integer('card_redesign_annual_count')->nullable();
            $table->enum('exportable',['true','false'])->nullable();
            $table->enum('is_notification_on',['true','false'])->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plans');
    }
};

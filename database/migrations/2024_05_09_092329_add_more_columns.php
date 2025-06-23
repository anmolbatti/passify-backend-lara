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
        Schema::table('libraries', function (Blueprint $table) {
            $table->string('card_description')->nullable();
            $table->string('how_can_earn')->nullable();
            $table->string('reward_name')->nullable();
            $table->string('reward_description')->nullable();
            $table->string('stamp_success_message')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('libraries', function (Blueprint $table) {
            //
        });
    }
};

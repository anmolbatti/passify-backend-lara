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
        Schema::table('pass_users', function (Blueprint $table) {
            $table->integer('stamps_earned')->nullable();
            $table->string('reward_available')->nullable();
            $table->integer('stamps_required_for_reward')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pass_users', function (Blueprint $table) {
            $table->dropColumn('stamps_earned');
            $table->dropColumn('reward_available');
            $table->dropColumn('stamps_required_for_reward');
        });
    }
};

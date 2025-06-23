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
        Schema::table('passes', function (Blueprint $table) {
            $table->string('location_name')->nullable();
            $table->string('address')->nullable();
            $table->string('address_description')->nullable();
            $table->string('card_description')->nullable();
            $table->string('how_can_earn')->nullable();
            $table->string('business_name')->nullable();
            $table->string('reward_name')->nullable();
            $table->string('reward_description')->nullable();
            $table->string('stamp_success_message')->nullable();
            $table->string('reward_success_message')->nullable();
            $table->string('expiry_date')->nullable();
            $table->string('link_text')->nullable();
            $table->string('link_href')->nullable();
            $table->string('link_type')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('passes', function (Blueprint $table) {
            //
        });
    }
};

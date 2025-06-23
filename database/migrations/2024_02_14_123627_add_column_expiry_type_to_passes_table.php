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
            $table->enum('expiry_type', ['none', 'fixed_date', 'fixed_period'])->nullable();
            $table->enum('expiry_period_type', ['day', 'month', 'year'])->nullable();
            $table->integer('expiry_period_count')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('passes', function (Blueprint $table) {
            $table->dropColumn("expiry_type");
            $table->dropColumn("expiry_period_type");
            $table->dropColumn("expiry_period_count");
        });
    }
};

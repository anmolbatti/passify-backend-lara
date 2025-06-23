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
            $table->string('classSuffix')->nullable();
            $table->string('deviceType')->nullable();
            $table->string('objectSuffix')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pass_users', function (Blueprint $table) {
            $table->dropColumn('classSuffix')->nullable();
            $table->dropColumn('deviceType')->nullable();
            $table->dropColumn('objectSuffix')->nullable();

        });
    }
};

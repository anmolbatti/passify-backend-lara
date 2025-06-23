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
        Schema::table('pass_locations', function (Blueprint $table) {
            $table->unsignedBigInteger('pass_id')->after('user_id')->nullable();
            $table->foreign('pass_id')->references('id')->on('passes');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pass_locations', function (Blueprint $table) {
            $table->dropForeign(['pass_id']);
            $table->dropColumn('pass_id');
        });
    }
};

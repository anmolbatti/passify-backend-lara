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
            $table->unsignedBigInteger('pass_id')->default('1');
            $table->foreign('pass_id')->on('passes')->references('id')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pass_users', function (Blueprint $table) {
            $table->dropForeign(['pass_id']);
            $table->dropColumn('pass_id');
        });
    }
};

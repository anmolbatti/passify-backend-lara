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
            $table->integer('update_sent')->nullable();
            $table->string('message_sent')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pass_users', function (Blueprint $table) {
            $table->dropColumn('update_sent');
            $table->dropColumn('message_sent');
        });
    }
};

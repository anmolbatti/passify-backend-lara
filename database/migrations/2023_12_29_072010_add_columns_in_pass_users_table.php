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
            $table->string('deviceLibraryIdentifier')->nullable();
            $table->string('passTypeIdentifier')->nullable();
            $table->string('pushToken')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pass_users_data', function (Blueprint $table) {
            $table->dropColumn('deviceLibraryIdentifier');
            $table->dropColumn('passTypeIdentifier');
            $table->dropColumn('pushToken');

        });
    }
};

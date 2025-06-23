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
            $table->dropColumn('link_text');
            $table->dropColumn('link_href');
            $table->dropColumn('link_type');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('passes', function (Blueprint $table) {
            $table->string('link_text')->after('expiry_date')->nullable();
            $table->string('link_href')->after('link_text')->nullable();
            $table->string('link_type')->after('link_href')->nullable();
        });
    }
};

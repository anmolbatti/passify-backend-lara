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
            $table->string('termsAndConditions')->nullable();
            $table->string('poweredBy')->nullable();
            $table->string('howToCollectStamps')->nullable();
            $table->string('rewardDetail')->nullable();
            $table->string('businessName')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('passes', function (Blueprint $table) {
            $table->dropColumn('termsAndConditions');
            $table->dropColumn('poweredBy');
            $table->dropColumn('howToCollectStamps');
            $table->dropColumn('rewardDetail');
            $table->dropColumn('businessName');
        });
    }
};

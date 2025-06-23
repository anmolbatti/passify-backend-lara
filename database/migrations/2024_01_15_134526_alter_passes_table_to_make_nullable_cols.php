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
            $table->string('pass_name')->nullable()->change();
            $table->enum('reward_type',['single','multi'])->nullable()->change();
            $table->string('icon_image')->nullable()->change();
            $table->string('logo_image')->nullable()->change();
            $table->integer('no_of_stamps')->nullable()->change();
            $table->string('stamps_color')->nullable()->change();
            $table->string('stamp_bg_color')->nullable()->change();
            $table->string('stamps_border_color')->nullable()->change();
            $table->integer('no_of_picked_stamps')->nullable()->change();
            $table->string('picked_stamps_image')->nullable()->change();
            $table->string('picked_stamps_icon')->nullable()->change();
            $table->integer('no_of_un_stamps')->nullable()->change();
            $table->string('un_stamps_image')->nullable()->change();
            $table->string('un_stamps_icon')->nullable()->change();
            $table->string('un_stamp_bg_color')->nullable()->change();
            $table->string('card_bg_color')->nullable()->change();
            $table->string('card_txt_color')->nullable()->change();
            $table->longText('strip_bg_image')->nullable()->change();
            $table->string('header_fields')->nullable()->change();
            $table->string('secondary_fields')->nullable()->change();
            $table->string('qr_type')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('passes', function (Blueprint $table) {
            $table->string('pass_name')->nullable(false)->change();
            $table->enum('reward_type',['single','multi'])->nullable(false)->change();
            $table->string('icon_image')->nullable(false)->change();
            $table->string('logo_image')->nullable(false)->change();
            $table->integer('no_of_stamps')->nullable(false)->change();
            $table->string('stamps_color')->nullable(false)->change();
            $table->string('stamp_bg_color')->nullable(false)->change();
            $table->string('stamps_border_color')->nullable(false)->change();
            $table->integer('no_of_picked_stamps')->nullable(false)->change();
            $table->string('picked_stamps_image')->nullable(false)->change();
            $table->string('picked_stamps_icon')->nullable(false)->change();
            $table->integer('no_of_un_stamps')->nullable(false)->change();
            $table->string('un_stamps_image')->nullable(false)->change();
            $table->string('un_stamps_icon')->nullable(false)->change();
            $table->string('un_stamp_bg_color')->nullable(false)->change();
            $table->string('card_bg_color')->nullable(false)->change();
            $table->string('card_txt_color')->nullable(false)->change();
            $table->longText('strip_bg_image')->nullable(false)->change();
            $table->string('header_fields')->nullable(false)->change();
            $table->string('secondary_fields')->nullable(false)->change();
            $table->string('qr_type')->nullable(false)->change();
        });
    }
};

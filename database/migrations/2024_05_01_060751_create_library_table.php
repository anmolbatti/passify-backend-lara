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
        Schema::create('libraries', function (Blueprint $table) {
            $table->id();
            $table->string('pass_name')->nullable();
            $table->enum('reward_type',['single','multi'])->nullable();
            $table->string('icon_image')->nullable();
            $table->string('logo_image')->nullable();
            $table->integer('no_of_stamps')->nullable();
            $table->string('stamps_color')->nullable();
            $table->string('stamp_bg_color')->nullable();
            $table->string('stamps_border_color')->nullable();
            $table->integer('no_of_picked_stamps')->nullable();

            $table->string('picked_stamps_image')->nullable();
            $table->string('picked_stamps_icon')->nullable();
            $table->integer('no_of_un_stamps')->nullable();
            $table->string('un_stamps_image')->nullable();
            $table->string('un_stamps_icon')->nullable();
            $table->string('un_stamp_bg_color')->nullable();
            $table->string('card_bg_color')->nullable();
            $table->string('card_txt_color')->nullable();
            $table->longText('strip_bg_image')->nullable();
            $table->string('header_fields')->nullable();

            $table->string('secondary_fields')->nullable();
            $table->string('qr_type')->nullable();
            $table->boolean('status')->default(true);
            $table->string('strip_bg_color')->nullable();
            $table->integer("category")->nullable();
            $table->string('termsAndConditions')->nullable();
            $table->string('poweredBy')->nullable();
            $table->string('howToCollectStamps')->nullable();
            $table->string('rewardDetail')->nullable();
            $table->string('businessName')->nullable();
            
            $table->enum('expiry_type', ['none', 'fixed_date', 'fixed_period'])->nullable();
            $table->enum('expiry_period_type', ['day', 'month', 'year'])->nullable();
            $table->integer('expiry_period_count')->nullable();
            $table->string("stamp_image_color")->nullable();
            $table->string("unstamp_image_color")->nullable();
            $table->string('reward_border_color')->nullable();
            $table->string('reward_bg_color')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('library');
    }
};

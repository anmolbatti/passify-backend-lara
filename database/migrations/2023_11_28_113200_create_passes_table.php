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
        Schema::create('passes', function (Blueprint $table) {
            $table->id();
            $table->string('pass_name');
            $table->boolean('status')->default(true);
            $table->enum('reward_type',['single','multi']);
            $table->string('icon_image');
            $table->string('logo_image');

            $table->integer('no_of_stamps');
            $table->string('stamps_color');
            $table->string('stamp_bg_color');
            $table->string('stamps_border_color');

            $table->integer('no_of_picked_stamps');
            $table->string('picked_stamps_image');
            $table->string('picked_stamps_icon');

            $table->integer('no_of_un_stamps');
            $table->string('un_stamps_image');
            $table->string('un_stamps_icon');
            $table->string('un_stamp_bg_color');

            $table->string('card_bg_color');
            $table->string('card_txt_color');

            $table->string('strip_bg_color');
            $table->longText('strip_bg_image');

            $table->string('header_fields');
            $table->string('secondary_fields');

            $table->string('qr_type');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('passes');
    }
};

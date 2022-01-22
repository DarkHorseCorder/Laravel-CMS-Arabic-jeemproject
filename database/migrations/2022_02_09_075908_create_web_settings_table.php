<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWebSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('web_settings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('contact_show')->nullable();
            $table->string('contact')->nullable();
            $table->string('address')->nullable();
            $table->string('facebook_link',     100)->nullable();
            $table->string('instagram_link',    100)->nullable();
            $table->string('linkedin_link',     100)->nullable();
            $table->string('twitter_link',      100)->nullable();
            $table->string('youtube_link',      100)->nullable();
            $table->string('whatsapp_link',     100)->nullable();

            $table->string('section_a',     100)->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('web_settings');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingAppInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('setting_app_infos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('app_name',255)->nullable(true);
            $table->string('app_src_icon',255)->nullable(true);
            $table->string('app_phone',20)->nullable(true);
            $table->string('app_fax',20)->nullable(true);
            $table->string('app_email',100)->nullable(true);
            $table->string('app_facebook',255)->nullable(true);
            $table->string('app_address',255)->nullable(true);
            $table->string('app_address_google_map',1000)->nullable(true);
            $table->string('app_title_chat_box',255)->nullable(true);
            $table->string('app_link_facebook_fanpage',1000)->nullable(true);
            $table->string('app_link_twitter',1000)->nullable(true);
            $table->string('app_link_youtube',1000)->nullable(true);
            $table->string('app_link_instagram',1000)->nullable(true);
            $table->string('app_make_product_video_one',1000)->nullable(true);
            $table->string('app_make_product_video_two',1000)->nullable(true);
            $table->text('app_content',1000)->nullable(true);
            $table->text('about_content')->nullable(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('setting_app_infos');
    }
}

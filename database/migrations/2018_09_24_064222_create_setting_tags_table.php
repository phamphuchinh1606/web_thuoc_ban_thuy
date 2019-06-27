<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('setting_tags', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tag_type')->default(1)->nullable(true);
            $table->string('tag_name')->nullable(true);
            $table->integer('product_type_id')->nullable(true);
            $table->integer('sort_number')->nullable(true);
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
        Schema::dropIfExists('setting_tags');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('blog_title',255)->nullable(true);
            $table->string('slug',255)->nullable(true);
            $table->dateTime('post_date')->nullable(true);
            $table->string('blog_description',1000)->nullable(true);
            $table->text('blog_content')->nullable(true);
            $table->string('blog_image',255)->nullable(true);
            $table->integer('is_public')->default(0);
            $table->integer('is_delete')->default(0);
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
        Schema::dropIfExists('blogs');
    }
}

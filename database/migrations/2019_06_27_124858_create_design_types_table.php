<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDesignTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('design_types', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('design_type_name',255)->nullable(false);
            $table->integer('parent_id')->nullable(true);
            $table->string('image_icon',255)->nullable(true);
            $table->string('slug',255)->nullable(true);
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
        Schema::dropIfExists('design_types');
    }
}

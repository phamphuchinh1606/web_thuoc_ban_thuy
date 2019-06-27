<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_addresses', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('order_id');
            $table->string('full_name',255)->nullable(true);
            $table->string('email',255)->nullable(true);
            $table->string('phone_number',20)->nullable(true);
            $table->string('address',255)->nullable(true);
            $table->string('city',100)->nullable(true);
            $table->string('ward',100)->nullable(true);
            $table->string('district',100)->nullable(true);
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
        Schema::dropIfExists('order_addresses');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('order_code',50)->nullable(true);
            $table->integer('user_id')->nullable(true);
            $table->integer('customer_id')->nullable(true);
            $table->dateTime('order_date')->nullable(true);
            $table->bigInteger('total_product_money')->nullable(true);
            $table->string('note',1000)->nullable(true);
            $table->string('discount_code',20)->nullable(true);
            $table->bigInteger('sale_of_money')->nullable(true);
            $table->bigInteger('ship_money')->nullable(true);
            $table->integer('tax_percent')->nullable(true);
            $table->bigInteger('tax_money')->nullable(true);
            $table->bigInteger('total_amount')->nullable(true);
            $table->bigInteger('payment_amount')->nullable(true);
            $table->integer('status_order')->nullable(true);
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
        Schema::dropIfExists('orders');
    }
}

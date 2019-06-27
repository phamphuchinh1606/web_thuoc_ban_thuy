<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',255);
            $table->string('email',255);
            $table->integer('user_type_id')->nullable(true);
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password',255);
            $table->string('phone_number',20)->nullable(true);
            $table->string('sex',20)->nullable(true);
            $table->string('address',255)->nullable(true);
            $table->string('city',100)->nullable(true);
            $table->string('ward',100)->nullable(true);
            $table->string('district',100)->nullable(true);
            $table->integer('delete_is')->default(0)->nullable(true);
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}

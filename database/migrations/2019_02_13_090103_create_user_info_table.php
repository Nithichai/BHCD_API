<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_info', function (Blueprint $table) {
            $table->increments('user_no');
            $table->text('id');
            $table->text('firstname')->nullable(true);
            $table->text('lastname')->nullable(true);
            $table->text('phone')->nullable(true);
            $table->text('email')->nullable(true);
            $table->text('career')->nullable(true);
            $table->date('birthday')->nullable(true);
            $table->text('displayName')->nullable(true);
            $table->text('pic')->nullable(true);
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
        Schema::dropIfExists('user_info');
    }
}

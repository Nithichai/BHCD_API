<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserLineTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('userline', function (Blueprint $table) {
            $table->increments('userno');
            $table->text('id');
            $table->text('esp');
            // $table->text('firstname')->nullable(true);
            // $table->text('lastname')->nullable(true);
            // $table->text('phone')->nullable(true);
            // $table->text('email')->nullable(true);
            // $table->text('career')->nullable(true);
            // $table->date('birthday')->nullable(true);
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
        Schema::dropIfExists('userline');
    }
}

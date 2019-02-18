<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDeviceInfomation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('device_infomation', function (Blueprint $table) {
            $table->increments('id');
            $table->text('device_id');
            $table->text('name')->nullable(true);
            $table->text('sex')->nullable(true);
            $table->integer('height')->nullable(true);
            $table->integer('weight')->nullable(true);
            $table->text('disease')->nullable(true);
            $table->text('phone')->nullable(true);
            $table->date('birthday')->nullable(true);
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
        Schema::dropIfExists('device_infomation');
    }
}

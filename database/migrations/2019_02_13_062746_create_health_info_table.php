<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHealthInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {   
        if (Schema::hasTable('heallh_info')) {
            // B.O.B do something!
        } else {
            Schema::create('health_info', function (Blueprint $table) {
                $table->increments('healthinfo_id');
                $table->string('esp_id');
                $table->string('systolic');
                $table->string('diastolic');
                $table->string('heartrate');
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('health_info');
    }
}

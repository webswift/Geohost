<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatesimcardsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('simcards', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('geoconfig_id');
            $table->integer('geohost_id');
            $table->string('provider');
            $table->string('network');
            $table->string('location');
            $table->string('country');
            $table->string('phone_number');
            $table->string('sim_number');
            $table->string('pin1');
            $table->string('puk1');
            $table->string('pin2');
            $table->string('puk2');
            $table->float('plan_data');
            $table->string('plan_cycle');
            $table->integer('plan_periods');
            $table->string('plan_cost');
            $table->string('plan_type');
            $table->string('login');
            $table->string('password');
            $table->string('login_url');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('simcards');
    }
}

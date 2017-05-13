<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreategeoconfigsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('geoconfigs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('machine_id');
            $table->string('host_ip');
            $table->integer('host_port');
            $table->string('guest_ip');
            $table->float('latitude');
            $table->float('longitude');
            $table->string('country_code');
            $table->string('region');
            $table->string('city');
            $table->integer('dma');
            $table->string('status');
            $table->string('geo_type');
            $table->string('geo_device');
            $table->string('geo_provider');
            $table->string('vpn_provider');
            $table->string('notes');
            $table->timestamp('start_date');
            $table->float('monthly_payment');
            $table->string('payment_frequency');
            $table->string('payment_status');
            $table->integer('geohost_id');
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
        Schema::drop('geoconfigs');
    }
}

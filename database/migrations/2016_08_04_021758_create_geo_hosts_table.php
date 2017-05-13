<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateGeoHostsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('geo_hosts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('firstname');
            $table->string('lastname');
            $table->string('telephone');
            $table->string('email');
            $table->string('payment_type');
            $table->string('paypal_email');
            $table->string('iban');
            $table->integer('ach_routing_number');
            $table->integer('ach_account_number');
            $table->string('address');
            $table->string('city');
            $table->string('zip_code');
            $table->string('country');
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
        Schema::drop('geo_hosts');
    }
}

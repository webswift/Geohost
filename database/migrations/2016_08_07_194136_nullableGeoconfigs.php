<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class NullableGeoconfigs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('geoconfigs', function ($table) {
            $table->string('machine_id')->nullable()->change();
            $table->float('latitude')->nullable()->change();
            $table->float('longitude')->nullable()->change();
            $table->string('dma')->default('')->change();
            $table->string('status')->nullable()->change();
            $table->string('geo_type')->nullable()->change();
            $table->string('geo_device')->nullable()->change();
            $table->string('geo_provider')->nullable()->change();
            $table->string('vpn_provider')->nullable()->change();
            $table->string('notes')->nullable()->change();
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}

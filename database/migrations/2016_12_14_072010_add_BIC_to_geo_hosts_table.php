<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddBICToGeoHostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('geo_hosts', function(Blueprint $table) {
            $table->string('BIC')->after('iban');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('geo_hosts', function(Blueprint $table) {
            $table->dropColumn('BIC');
        });
    }
}

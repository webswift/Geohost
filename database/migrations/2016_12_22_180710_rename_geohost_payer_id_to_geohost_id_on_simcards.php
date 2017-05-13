<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RenameGeohostPayerIdToGeohostIdOnSimcards extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('simcards', function($t) {
            $t->renameColumn('geohost_payer_id', 'geohost_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('simcards', function($t) {
            $t->renameColumn('geohost_id', 'geohost_payer_id');
        });
    }
}

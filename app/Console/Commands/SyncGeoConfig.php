<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Redis;
use App\Repositories\GeoconfigRepository;
use App\Models\Geoconfig;

class SyncGeoConfig extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'syncgeoconfig';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Imports geoconfig from serverapp';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        return $this->doSync();
    }

    public function doSync()
    {
        $geoconfig = file_get_contents("https://api.clarityad.com/rest/14/geo/all?key=***REMOVED***&status[]=ACTIVE&status[]=DISABLED&status[]=INACTIVE");
        if(!$geoconfig) {
            return;
        }
        $geoconfig = json_decode($geoconfig, true);
        if(!$geoconfig) {
            return;
        }

        foreach($geoconfig['proxies'] as $geonode) {

            $gc = new Geoconfig();

            if( in_array($geonode['geo_type'], ["DATACENTER", ""] )) {
                continue;
            }

            // Geoconfig ID is not part of the schema
            unset($geonode['geoconfig_id']);

            $gc->firstOrNew( array("machine_id" => $geonode['machine_id']))->fill($geonode)->save();
        }
    }

}

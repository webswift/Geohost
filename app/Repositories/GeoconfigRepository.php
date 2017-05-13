<?php

namespace App\Repositories;

use App\Models\Geoconfig;
use InfyOm\Generator\Common\BaseRepository;

class GeoconfigRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'machine_id',
        'host_ip',
        'host_port',
        'guest_ip',
        'latitude',
        'longitude',
        'country_code',
        'region',
        'city',
        'dma',
        'status',
        'geo_type',
        'geo_device',
        'geo_provider',
        'vpn_provider',
        'notes',
        'start_date',
        'monthly_payment',
        'payment_frequency',
        'payment_status',
        'geohost_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Geoconfig::class;
    }
}

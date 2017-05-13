<?php

namespace App\Repositories;

use App\Models\Simcard;
use InfyOm\Generator\Common\BaseRepository;

class SimcardRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'geoconfig_id',
        'geohost_id',
        'provider',
        'network',
        'location',
        'country',
        'phone_number',
        'sim_number',
        'pin1',
        'puk1',
        'pin2',
        'puk2',
        'plan_data',
        'plan_cycle',
        'plan_periods',
        'plan_cost',
        'plan_type',
        'login',
        'password',
        'login_url'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Simcard::class;
    }
}

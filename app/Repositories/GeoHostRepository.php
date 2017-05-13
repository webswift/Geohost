<?php

namespace App\Repositories;

use App\Models\GeoHost;
use InfyOm\Generator\Common\BaseRepository;

class GeoHostRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'firstname',
        'lastname',
        'telephone',
        'email',
        'payment_type',
        'paypal_email',
        'iban',
        'ach_routing_number',
        'ach_account_number',
        'address',
        'city',
        'zip_code',
        'country'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return GeoHost::class;
    }
}

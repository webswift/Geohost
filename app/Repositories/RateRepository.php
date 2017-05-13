<?php

namespace App\Repositories;

use App\Models\Rate;
use InfyOm\Generator\Common\BaseRepository;

class RateRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'currency',
        'value'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Rate::class;
    }
}

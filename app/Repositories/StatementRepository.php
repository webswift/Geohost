<?php

namespace App\Repositories;

use App\Models\Statement;
use InfyOm\Generator\Common\BaseRepository;

class StatementRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'short_description',
        'long_description',
        'amount',
        'currency',
        'paid',
        'geohost_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Statement::class;
    }
}

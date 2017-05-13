<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="Rate",
 *      required={},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="currency",
 *          description="currency",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="value",
 *          description="value",
 *          type="number",
 *          format="float"
 *      ),
 *      @SWG\Property(
 *          property="updated_at",
 *          description="updated_at",
 *          type="string",
 *          format="date-time"
 *      )
 * )
 */
class Rate extends Model
{
    use SoftDeletes;

    public $table = 'rates';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'currency',
        'value'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'currency' => 'string',
        'value' => 'float'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    public static function getList()
    {
        // Make custom query to get full name + transform to associative array
        $rates_result = \DB::select('select currency, concat(currency) as name from rates');
        $rates = array();

        foreach($rates_result as $ghr) {
            $rates[$ghr->currency] = trim($ghr->name, ", ");
        }

        return $rates;
    }
}

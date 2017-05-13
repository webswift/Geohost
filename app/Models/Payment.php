<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="Payment",
 *      required={},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="created_at",
 *          description="created_at",
 *          type="string",
 *          format="date-time"
 *      ),
 *      @SWG\Property(
 *          property="updated_at",
 *          description="updated_at",
 *          type="string",
 *          format="date-time"
 *      ),
 *      @SWG\Property(
 *          property="amount",
 *          description="amount",
 *          type="number",
 *          format="float"
 *      ),
 *      @SWG\Property(
 *          property="currency",
 *          description="currency",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="description",
 *          description="description",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="geohost_id",
 *          description="geohost_id",
 *          type="integer",
 *          format="int32"
 *      )
 * )
 */
class Payment extends Model
{
    use SoftDeletes;

    public $table = 'payments';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'amount',
        'currency',
        'description',
        'geohost_id',
        'reference'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'amount' => 'float',
        'currency' => 'string',
        'description' => 'string',
        'geohost_id' => 'integer',
        'reference' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'amount' => 'numeric'
    ];

    public function delete()
    {
        $statements = $this->statements()->get();

        foreach ($statements as $statement)
            $statement->undoPay();

        return parent::delete();
    }

    public function geoHost()
    {
        return $this->belongsTo('App\Models\GeoHost', 'id');
    }

    public function statements()
    {
        return $this->hasmany('App\Models\Statement', 'payment_id');
    }
}

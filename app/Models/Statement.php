<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="Statement",
 *      required={},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="short_description",
 *          description="short_description",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="long_description",
 *          description="long_description",
 *          type="string"
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
 *          property="paid",
 *          description="paid",
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
class Statement extends Model
{
    use SoftDeletes;

    public $table = 'statements';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'short_description',
        'long_description',
        'amount',
        'currency',
//        'paid',
        'geohost_id'
    ];

    public static $isShowAll = true;

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'short_description' => 'string',
        'long_description' => 'string',
        'amount' => 'float',
        'currency' => 'string',
//        'paid' => 'string',
        'geohost_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'amount' => 'numeric'
    ];

//    public function delete()
//    {
//        return parent::delete();
//    }

    public function geoHost()
    {
        return $this->belongsTo('App\Models\GeoHost', 'id');
    }

    public function payment()
    {
        return $this->belongsTo('App\Models\Payment', 'id');
    }

    public static function getListByGeoHostID($geoHostID)
    {

    }

    public static function getItem($id)
    {

    }

    public static function setShowAll($isAllShow = true)
    {
        Statement::$isShowAll = $isAllShow;
    }

    public static function isShowAll()
    {
        return Statement::$isShowAll;
    }

    public function undoPay()
    {
        $this->payment_id = 0;
        $this->save();
    }
}

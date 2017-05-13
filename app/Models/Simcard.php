<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="Simcard",
 *      required={""},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="geoconfig_id",
 *          description="geoconfig_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="geohost_payer_id",
 *          description="geohost_payer_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="provider",
 *          description="provider",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="network",
 *          description="network",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="location",
 *          description="location",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="country",
 *          description="country",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="phone_number",
 *          description="phone_number",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="sim_number",
 *          description="sim_number",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="pin1",
 *          description="pin1",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="puk1",
 *          description="puk1",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="pin2",
 *          description="pin2",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="puk2",
 *          description="puk2",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="plan_data",
 *          description="plan_data",
 *          type="number",
 *          format="float"
 *      ),
 *      @SWG\Property(
 *          property="plan_cycle",
 *          description="plan_cycle",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="plan_periods",
 *          description="plan_periods",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="plan_cost",
 *          description="plan_cost",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="plan_type",
 *          description="plan_type",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="login",
 *          description="login",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="password",
 *          description="password",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="login_url",
 *          description="login_url",
 *          type="string"
 *      )
 * )
 */
class Simcard extends Model
{
    use SoftDeletes;

    public $table = 'simcards';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
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
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'geoconfig_id' => 'integer',
        'geohost_id' => 'integer',
        'provider' => 'string',
        'network' => 'string',
        'location' => 'string',
        'country' => 'string',
        'phone_number' => 'string',
        'sim_number' => 'string',
        'pin1' => 'string',
        'puk1' => 'string',
        'pin2' => 'string',
        'puk2' => 'string',
        'plan_data' => 'float',
        'plan_cycle' => 'string',
        'plan_periods' => 'integer',
        'plan_cost' => 'string',
        'plan_type' => 'string',
        'login' => 'string',
        'password' => 'string',
        'login_url' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    public function delete()
    {
        return parent::delete();
    }

    public function geoHost()
    {
        return $this->belongsTo('App\Models\GeoHost', 'id');
    }

    public function geoConfig()
    {
        return $this->belongsTo('App\Models\Geoconfig', 'id');
    }
}

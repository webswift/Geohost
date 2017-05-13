<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="Geoconfig",
 *      required={""},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="machine_id",
 *          description="machine_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="host_ip",
 *          description="host_ip",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="host_port",
 *          description="host_port",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="guest_ip",
 *          description="guest_ip",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="latitude",
 *          description="latitude",
 *          type="number",
 *          format="float"
 *      ),
 *      @SWG\Property(
 *          property="longitude",
 *          description="longitude",
 *          type="number",
 *          format="float"
 *      ),
 *      @SWG\Property(
 *          property="country_code",
 *          description="country_code",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="region",
 *          description="region",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="city",
 *          description="city",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="dma",
 *          description="dma",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="status",
 *          description="status",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="geo_type",
 *          description="geo_type",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="geo_device",
 *          description="geo_device",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="geo_provider",
 *          description="geo_provider",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="vpn_provider",
 *          description="vpn_provider",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="notes",
 *          description="notes",
 *          type="string"
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
 *          property="start_date",
 *          description="start_date",
 *          type="string",
 *          format="date-time"
 *      ),
 *      @SWG\Property(
 *          property="monthly_payment",
 *          description="monthly_payment",
 *          type="number",
 *          format="float"
 *      ),
 *      @SWG\Property(
 *          property="payment_frequency",
 *          description="payment_frequency",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="payment_status",
 *          description="payment_status",
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
class Geoconfig extends Model
{
    use SoftDeletes;

    public $table = 'geoconfigs';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
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
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'machine_id' => 'string',
        'host_ip' => 'string',
        'host_port' => 'integer',
        'guest_ip' => 'string',
        'latitude' => 'float',
        'longitude' => 'float',
        'country_code' => 'string',
        'region' => 'string',
        'city' => 'string',
        'dma' => 'integer',
        'status' => 'string',
        'geo_type' => 'string',
        'geo_device' => 'string',
        'geo_provider' => 'string',
        'vpn_provider' => 'string',
        'notes' => 'string',
        'monthly_payment' => 'float',
        'payment_frequency' => 'string',
        'payment_status' => 'string',
        'geohost_id' => 'integer'
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
        $this->simCards()->delete();

        return parent::delete();
    }

    public function geoHost()
    {
        return $this->belongsTo('App\Models\GeoHost', 'id');
    }

    public function simCards()
    {
        return $this->hasmany('App\Models\Simcard', 'geoconfig_id');
    }

    public static function getList()
    {
        // Make custom query to get full name + transform to associative array
        $geoConfigs_result = \DB::select('select id, concat(machine_id, " ", host_ip) as name from geoconfigs');
        $geoConfigs = array();

        foreach($geoConfigs_result as $ghr) {
            $geoConfigs[$ghr->id] = trim($ghr->name, ", ");
        }

        return $geoConfigs;
    }
}

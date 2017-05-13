<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="GeoHost",
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
 *          property="firstname",
 *          description="firstname",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="lastname",
 *          description="lastname",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="telephone",
 *          description="telephone",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="email",
 *          description="email",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="payment_type",
 *          description="payment_type",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="paypal_email",
 *          description="paypal_email",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="iban",
 *          description="iban",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="ach_routing_number",
 *          description="ach_routing_number",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="ach_account_number",
 *          description="ach_account_number",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="address",
 *          description="address",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="city",
 *          description="city",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="zip_code",
 *          description="zip_code",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="country",
 *          description="country",
 *          type="string"
 *      )
 * )
 */
class GeoHost extends Model
{
    use SoftDeletes;

    public $table = 'geo_hosts';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'user_id',
        'firstname',
        'lastname',
        'telephone',
        'email',
        'payment_type',
        'paypal_email',
        'iban',
        'BIC',
        'ach_routing_number',
        'ach_account_number',
        'address',
        'city',
        'zip_code',
        'country'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'user_id' => 'int',
        'firstname' => 'string',
        'lastname' => 'string',
        'telephone' => 'string',
        'email' => 'string',
        'payment_type' => 'string',
        'paypal_email' => 'string',
        'iban' => 'string',
        'BIC' => 'string',
        'ach_routing_number' => 'integer',
        'ach_account_number' => 'integer',
        'address' => 'string',
        'city' => 'string',
        'zip_code' => 'string',
        'country' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
            'BIC' => 'required|max:12'
    ];

/*
    protected $appends = [
        'balance_usd'
    ];
*/

    /* Get List of Geo Hosts for use in Dropdown HTML controls
     * @param void
     * @return array    associative array with "id" keys and "formatted name" values
     *
     * */
    public static function getList()
    {
        // Make custom query to get full name + transform to associative array
        $geoHosts_result = \DB::select('select id, concat(firstname, " ", lastname, ", ", city) as name from geo_hosts');
        $geoHosts = array();

        foreach($geoHosts_result as $ghr) {
            $geoHosts[$ghr->id] = trim($ghr->name, ", ");
        }

        return $geoHosts;
    }

    public static function getGeoHostID($userID)
    {
        $result = \DB::select('select id from geo_hosts where user_id = ' . $userID . ';');
        return $result[0]->id;
    }

    public function delete()
    {
        $this->simCards()->delete();
        $this->geoConfigs()->delete();
        $this->statements()->delete();
        $this->payments()->delete();

        return parent::delete();
    }

    public function user()
    {
        return $this->hasone('App\User', 'id');
    }

    public function geoConfigs()
    {
        return $this->hasmany('App\Models\GeoConfig', 'geohost_id');
    }

    public function simCards()
    {
        return $this->hasmany('App\Models\Simcard', 'geohost_id');
    }

    public function statements()
    {
        return $this->hasmany('App\Models\Statement', 'geohost_id');
    }

    public function payments()
    {
        return $this->hasmany('App\Models\Payment', 'geohost_id');
    }
}

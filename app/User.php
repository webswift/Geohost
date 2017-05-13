<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'admin', 'geohost_id'
    ];

    public function delete()
    {
        $this->geoHost()->delete();

        return parent::delete();
    }

    public function geoHost()
    {
        return $this->belongsTo('App\Models\GeoHost', 'user_id');
    }

    /* Get List of Users for use in Dropdown HTML controls
     * @param void
     * @return array    associative array with "id" keys and "formatted name" values
     *
     * */
    public static function getGeoHostList()
    {
        // Make custom query to get full name + transform to associative array
        $users_result = \DB::select('select id, concat(name, " <", email, "> ") as name from users where admin = 0 AND geohost_id = 0;');
        $users = array();

        foreach($users_result as $user) {
            $users[$user->id] = $user->name;
        }

        return $users;
    }
}

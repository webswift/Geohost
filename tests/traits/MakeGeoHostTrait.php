<?php

use Faker\Factory as Faker;
use App\Models\GeoHost;
use App\Repositories\GeoHostRepository;

trait MakeGeoHostTrait
{
    /**
     * Create fake instance of GeoHost and save it in database
     *
     * @param array $geoHostFields
     * @return GeoHost
     */
    public function makeGeoHost($geoHostFields = [])
    {
        /** @var GeoHostRepository $geoHostRepo */
        $geoHostRepo = App::make(GeoHostRepository::class);
        $theme = $this->fakeGeoHostData($geoHostFields);
        return $geoHostRepo->create($theme);
    }

    /**
     * Get fake instance of GeoHost
     *
     * @param array $geoHostFields
     * @return GeoHost
     */
    public function fakeGeoHost($geoHostFields = [])
    {
        return new GeoHost($this->fakeGeoHostData($geoHostFields));
    }

    /**
     * Get fake data of GeoHost
     *
     * @param array $postFields
     * @return array
     */
    public function fakeGeoHostData($geoHostFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'created_at' => $fake->word,
            'updated_at' => $fake->word,
            'firstname' => $fake->word,
            'lastname' => $fake->word,
            'telephone' => $fake->word,
            'email' => $fake->word,
            'payment_type' => $fake->word,
            'paypal_email' => $fake->word,
            'iban' => $fake->word,
            'ach_routing_number' => $fake->randomDigitNotNull,
            'ach_account_number' => $fake->randomDigitNotNull,
            'address' => $fake->word,
            'city' => $fake->word,
            'zip_code' => $fake->word,
            'country' => $fake->word
        ], $geoHostFields);
    }
}

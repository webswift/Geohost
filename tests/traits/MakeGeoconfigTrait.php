<?php

use Faker\Factory as Faker;
use App\Models\Geoconfig;
use App\Repositories\GeoconfigRepository;

trait MakeGeoconfigTrait
{
    /**
     * Create fake instance of Geoconfig and save it in database
     *
     * @param array $geoconfigFields
     * @return Geoconfig
     */
    public function makeGeoconfig($geoconfigFields = [])
    {
        /** @var GeoconfigRepository $geoconfigRepo */
        $geoconfigRepo = App::make(GeoconfigRepository::class);
        $theme = $this->fakeGeoconfigData($geoconfigFields);
        return $geoconfigRepo->create($theme);
    }

    /**
     * Get fake instance of Geoconfig
     *
     * @param array $geoconfigFields
     * @return Geoconfig
     */
    public function fakeGeoconfig($geoconfigFields = [])
    {
        return new Geoconfig($this->fakeGeoconfigData($geoconfigFields));
    }

    /**
     * Get fake data of Geoconfig
     *
     * @param array $postFields
     * @return array
     */
    public function fakeGeoconfigData($geoconfigFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'machine_id' => $fake->randomDigitNotNull,
            'host_ip' => $fake->word,
            'host_port' => $fake->randomDigitNotNull,
            'guest_ip' => $fake->word,
            'latitude' => $fake->randomDigitNotNull,
            'longitude' => $fake->randomDigitNotNull,
            'country_code' => $fake->word,
            'region' => $fake->word,
            'city' => $fake->word,
            'dma' => $fake->randomDigitNotNull,
            'status' => $fake->word,
            'geo_type' => $fake->word,
            'geo_device' => $fake->word,
            'geo_provider' => $fake->word,
            'vpn_provider' => $fake->word,
            'notes' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word,
            'start_date' => $fake->word,
            'monthly_payment' => $fake->randomDigitNotNull,
            'payment_frequency' => $fake->word,
            'payment_status' => $fake->word,
            'geohost_id' => $fake->randomDigitNotNull
        ], $geoconfigFields);
    }
}

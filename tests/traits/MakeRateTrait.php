<?php

use Faker\Factory as Faker;
use App\Models\Rate;
use App\Repositories\RateRepository;

trait MakeRateTrait
{
    /**
     * Create fake instance of Rate and save it in database
     *
     * @param array $rateFields
     * @return Rate
     */
    public function makeRate($rateFields = [])
    {
        /** @var RateRepository $rateRepo */
        $rateRepo = App::make(RateRepository::class);
        $theme = $this->fakeRateData($rateFields);
        return $rateRepo->create($theme);
    }

    /**
     * Get fake instance of Rate
     *
     * @param array $rateFields
     * @return Rate
     */
    public function fakeRate($rateFields = [])
    {
        return new Rate($this->fakeRateData($rateFields));
    }

    /**
     * Get fake data of Rate
     *
     * @param array $postFields
     * @return array
     */
    public function fakeRateData($rateFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'currency' => $fake->word,
            'value' => $fake->randomDigitNotNull,
            'updated_at' => $fake->word
        ], $rateFields);
    }
}

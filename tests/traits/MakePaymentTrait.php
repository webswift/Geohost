<?php

use Faker\Factory as Faker;
use App\Models\Payment;
use App\Repositories\PaymentRepository;

trait MakePaymentTrait
{
    /**
     * Create fake instance of Payment and save it in database
     *
     * @param array $paymentFields
     * @return Payment
     */
    public function makePayment($paymentFields = [])
    {
        /** @var PaymentRepository $paymentRepo */
        $paymentRepo = App::make(PaymentRepository::class);
        $theme = $this->fakePaymentData($paymentFields);
        return $paymentRepo->create($theme);
    }

    /**
     * Get fake instance of Payment
     *
     * @param array $paymentFields
     * @return Payment
     */
    public function fakePayment($paymentFields = [])
    {
        return new Payment($this->fakePaymentData($paymentFields));
    }

    /**
     * Get fake data of Payment
     *
     * @param array $postFields
     * @return array
     */
    public function fakePaymentData($paymentFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'created_at' => $fake->word,
            'updated_at' => $fake->word,
            'amount' => $fake->randomDigitNotNull,
            'currency' => $fake->word,
            'description' => $fake->word,
            'geohost_id' => $fake->randomDigitNotNull
        ], $paymentFields);
    }
}

<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class RateApiTest extends TestCase
{
    use MakeRateTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateRate()
    {
        $rate = $this->fakeRateData();
        $this->json('POST', '/api/v1/rates', $rate);

        $this->assertApiResponse($rate);
    }

    /**
     * @test
     */
    public function testReadRate()
    {
        $rate = $this->makeRate();
        $this->json('GET', '/api/v1/rates/'.$rate->id);

        $this->assertApiResponse($rate->toArray());
    }

    /**
     * @test
     */
    public function testUpdateRate()
    {
        $rate = $this->makeRate();
        $editedRate = $this->fakeRateData();

        $this->json('PUT', '/api/v1/rates/'.$rate->id, $editedRate);

        $this->assertApiResponse($editedRate);
    }

    /**
     * @test
     */
    public function testDeleteRate()
    {
        $rate = $this->makeRate();
        $this->json('DELETE', '/api/v1/rates/'.$rate->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/rates/'.$rate->id);

        $this->assertResponseStatus(404);
    }
}

<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class GeoconfigApiTest extends TestCase
{
    use MakeGeoconfigTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateGeoconfig()
    {
        $geoconfig = $this->fakeGeoconfigData();
        $this->json('POST', '/api/v1/geoconfigs', $geoconfig);

        $this->assertApiResponse($geoconfig);
    }

    /**
     * @test
     */
    public function testReadGeoconfig()
    {
        $geoconfig = $this->makeGeoconfig();
        $this->json('GET', '/api/v1/geoconfigs/'.$geoconfig->id);

        $this->assertApiResponse($geoconfig->toArray());
    }

    /**
     * @test
     */
    public function testUpdateGeoconfig()
    {
        $geoconfig = $this->makeGeoconfig();
        $editedGeoconfig = $this->fakeGeoconfigData();

        $this->json('PUT', '/api/v1/geoconfigs/'.$geoconfig->id, $editedGeoconfig);

        $this->assertApiResponse($editedGeoconfig);
    }

    /**
     * @test
     */
    public function testDeleteGeoconfig()
    {
        $geoconfig = $this->makeGeoconfig();
        $this->json('DELETE', '/api/v1/geoconfigs/'.$geoconfig->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/geoconfigs/'.$geoconfig->id);

        $this->assertResponseStatus(404);
    }
}

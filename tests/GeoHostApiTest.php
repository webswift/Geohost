<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class GeoHostApiTest extends TestCase
{
    use MakeGeoHostTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateGeoHost()
    {
        $geoHost = $this->fakeGeoHostData();
        $this->json('POST', '/api/v1/geoHosts', $geoHost);

        $this->assertApiResponse($geoHost);
    }

    /**
     * @test
     */
    public function testReadGeoHost()
    {
        $geoHost = $this->makeGeoHost();
        $this->json('GET', '/api/v1/geoHosts/'.$geoHost->id);

        $this->assertApiResponse($geoHost->toArray());
    }

    /**
     * @test
     */
    public function testUpdateGeoHost()
    {
        $geoHost = $this->makeGeoHost();
        $editedGeoHost = $this->fakeGeoHostData();

        $this->json('PUT', '/api/v1/geoHosts/'.$geoHost->id, $editedGeoHost);

        $this->assertApiResponse($editedGeoHost);
    }

    /**
     * @test
     */
    public function testDeleteGeoHost()
    {
        $geoHost = $this->makeGeoHost();
        $this->json('DELETE', '/api/v1/geoHosts/'.$geoHost->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/geoHosts/'.$geoHost->id);

        $this->assertResponseStatus(404);
    }
}

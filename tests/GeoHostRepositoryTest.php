<?php

use App\Models\GeoHost;
use App\Repositories\GeoHostRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class GeoHostRepositoryTest extends TestCase
{
    use MakeGeoHostTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var GeoHostRepository
     */
    protected $geoHostRepo;

    public function setUp()
    {
        parent::setUp();
        $this->geoHostRepo = App::make(GeoHostRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateGeoHost()
    {
        $geoHost = $this->fakeGeoHostData();
        $createdGeoHost = $this->geoHostRepo->create($geoHost);
        $createdGeoHost = $createdGeoHost->toArray();
        $this->assertArrayHasKey('id', $createdGeoHost);
        $this->assertNotNull($createdGeoHost['id'], 'Created GeoHost must have id specified');
        $this->assertNotNull(GeoHost::find($createdGeoHost['id']), 'GeoHost with given id must be in DB');
        $this->assertModelData($geoHost, $createdGeoHost);
    }

    /**
     * @test read
     */
    public function testReadGeoHost()
    {
        $geoHost = $this->makeGeoHost();
        $dbGeoHost = $this->geoHostRepo->find($geoHost->id);
        $dbGeoHost = $dbGeoHost->toArray();
        $this->assertModelData($geoHost->toArray(), $dbGeoHost);
    }

    /**
     * @test update
     */
    public function testUpdateGeoHost()
    {
        $geoHost = $this->makeGeoHost();
        $fakeGeoHost = $this->fakeGeoHostData();
        $updatedGeoHost = $this->geoHostRepo->update($fakeGeoHost, $geoHost->id);
        $this->assertModelData($fakeGeoHost, $updatedGeoHost->toArray());
        $dbGeoHost = $this->geoHostRepo->find($geoHost->id);
        $this->assertModelData($fakeGeoHost, $dbGeoHost->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteGeoHost()
    {
        $geoHost = $this->makeGeoHost();
        $resp = $this->geoHostRepo->delete($geoHost->id);
        $this->assertTrue($resp);
        $this->assertNull(GeoHost::find($geoHost->id), 'GeoHost should not exist in DB');
    }
}

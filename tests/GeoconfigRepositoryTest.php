<?php

use App\Models\Geoconfig;
use App\Repositories\GeoconfigRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class GeoconfigRepositoryTest extends TestCase
{
    use MakeGeoconfigTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var GeoconfigRepository
     */
    protected $geoconfigRepo;

    public function setUp()
    {
        parent::setUp();
        $this->geoconfigRepo = App::make(GeoconfigRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateGeoconfig()
    {
        $geoconfig = $this->fakeGeoconfigData();
        $createdGeoconfig = $this->geoconfigRepo->create($geoconfig);
        $createdGeoconfig = $createdGeoconfig->toArray();
        $this->assertArrayHasKey('id', $createdGeoconfig);
        $this->assertNotNull($createdGeoconfig['id'], 'Created Geoconfig must have id specified');
        $this->assertNotNull(Geoconfig::find($createdGeoconfig['id']), 'Geoconfig with given id must be in DB');
        $this->assertModelData($geoconfig, $createdGeoconfig);
    }

    /**
     * @test read
     */
    public function testReadGeoconfig()
    {
        $geoconfig = $this->makeGeoconfig();
        $dbGeoconfig = $this->geoconfigRepo->find($geoconfig->id);
        $dbGeoconfig = $dbGeoconfig->toArray();
        $this->assertModelData($geoconfig->toArray(), $dbGeoconfig);
    }

    /**
     * @test update
     */
    public function testUpdateGeoconfig()
    {
        $geoconfig = $this->makeGeoconfig();
        $fakeGeoconfig = $this->fakeGeoconfigData();
        $updatedGeoconfig = $this->geoconfigRepo->update($fakeGeoconfig, $geoconfig->id);
        $this->assertModelData($fakeGeoconfig, $updatedGeoconfig->toArray());
        $dbGeoconfig = $this->geoconfigRepo->find($geoconfig->id);
        $this->assertModelData($fakeGeoconfig, $dbGeoconfig->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteGeoconfig()
    {
        $geoconfig = $this->makeGeoconfig();
        $resp = $this->geoconfigRepo->delete($geoconfig->id);
        $this->assertTrue($resp);
        $this->assertNull(Geoconfig::find($geoconfig->id), 'Geoconfig should not exist in DB');
    }
}

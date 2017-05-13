<?php

use App\Models\Rate;
use App\Repositories\RateRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class RateRepositoryTest extends TestCase
{
    use MakeRateTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var RateRepository
     */
    protected $rateRepo;

    public function setUp()
    {
        parent::setUp();
        $this->rateRepo = App::make(RateRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateRate()
    {
        $rate = $this->fakeRateData();
        $createdRate = $this->rateRepo->create($rate);
        $createdRate = $createdRate->toArray();
        $this->assertArrayHasKey('id', $createdRate);
        $this->assertNotNull($createdRate['id'], 'Created Rate must have id specified');
        $this->assertNotNull(Rate::find($createdRate['id']), 'Rate with given id must be in DB');
        $this->assertModelData($rate, $createdRate);
    }

    /**
     * @test read
     */
    public function testReadRate()
    {
        $rate = $this->makeRate();
        $dbRate = $this->rateRepo->find($rate->id);
        $dbRate = $dbRate->toArray();
        $this->assertModelData($rate->toArray(), $dbRate);
    }

    /**
     * @test update
     */
    public function testUpdateRate()
    {
        $rate = $this->makeRate();
        $fakeRate = $this->fakeRateData();
        $updatedRate = $this->rateRepo->update($fakeRate, $rate->id);
        $this->assertModelData($fakeRate, $updatedRate->toArray());
        $dbRate = $this->rateRepo->find($rate->id);
        $this->assertModelData($fakeRate, $dbRate->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteRate()
    {
        $rate = $this->makeRate();
        $resp = $this->rateRepo->delete($rate->id);
        $this->assertTrue($resp);
        $this->assertNull(Rate::find($rate->id), 'Rate should not exist in DB');
    }
}

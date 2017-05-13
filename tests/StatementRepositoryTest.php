<?php

use App\Models\Statement;
use App\Repositories\StatementRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class StatementRepositoryTest extends TestCase
{
    use MakeStatementTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var StatementRepository
     */
    protected $statementRepo;

    public function setUp()
    {
        parent::setUp();
        $this->statementRepo = App::make(StatementRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateStatement()
    {
        $statement = $this->fakeStatementData();
        $createdStatement = $this->statementRepo->create($statement);
        $createdStatement = $createdStatement->toArray();
        $this->assertArrayHasKey('id', $createdStatement);
        $this->assertNotNull($createdStatement['id'], 'Created Statement must have id specified');
        $this->assertNotNull(Statement::find($createdStatement['id']), 'Statement with given id must be in DB');
        $this->assertModelData($statement, $createdStatement);
    }

    /**
     * @test read
     */
    public function testReadStatement()
    {
        $statement = $this->makeStatement();
        $dbStatement = $this->statementRepo->find($statement->id);
        $dbStatement = $dbStatement->toArray();
        $this->assertModelData($statement->toArray(), $dbStatement);
    }

    /**
     * @test update
     */
    public function testUpdateStatement()
    {
        $statement = $this->makeStatement();
        $fakeStatement = $this->fakeStatementData();
        $updatedStatement = $this->statementRepo->update($fakeStatement, $statement->id);
        $this->assertModelData($fakeStatement, $updatedStatement->toArray());
        $dbStatement = $this->statementRepo->find($statement->id);
        $this->assertModelData($fakeStatement, $dbStatement->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteStatement()
    {
        $statement = $this->makeStatement();
        $resp = $this->statementRepo->delete($statement->id);
        $this->assertTrue($resp);
        $this->assertNull(Statement::find($statement->id), 'Statement should not exist in DB');
    }
}

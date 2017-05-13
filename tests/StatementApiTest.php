<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class StatementApiTest extends TestCase
{
    use MakeStatementTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateStatement()
    {
        $statement = $this->fakeStatementData();
        $this->json('POST', '/api/v1/statements', $statement);

        $this->assertApiResponse($statement);
    }

    /**
     * @test
     */
    public function testReadStatement()
    {
        $statement = $this->makeStatement();
        $this->json('GET', '/api/v1/statements/'.$statement->id);

        $this->assertApiResponse($statement->toArray());
    }

    /**
     * @test
     */
    public function testUpdateStatement()
    {
        $statement = $this->makeStatement();
        $editedStatement = $this->fakeStatementData();

        $this->json('PUT', '/api/v1/statements/'.$statement->id, $editedStatement);

        $this->assertApiResponse($editedStatement);
    }

    /**
     * @test
     */
    public function testDeleteStatement()
    {
        $statement = $this->makeStatement();
        $this->json('DELETE', '/api/v1/statements/'.$statement->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/statements/'.$statement->id);

        $this->assertResponseStatus(404);
    }
}

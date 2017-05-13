<?php

use Faker\Factory as Faker;
use App\Models\Statement;
use App\Repositories\StatementRepository;

trait MakeStatementTrait
{
    /**
     * Create fake instance of Statement and save it in database
     *
     * @param array $statementFields
     * @return Statement
     */
    public function makeStatement($statementFields = [])
    {
        /** @var StatementRepository $statementRepo */
        $statementRepo = App::make(StatementRepository::class);
        $theme = $this->fakeStatementData($statementFields);
        return $statementRepo->create($theme);
    }

    /**
     * Get fake instance of Statement
     *
     * @param array $statementFields
     * @return Statement
     */
    public function fakeStatement($statementFields = [])
    {
        return new Statement($this->fakeStatementData($statementFields));
    }

    /**
     * Get fake data of Statement
     *
     * @param array $postFields
     * @return array
     */
    public function fakeStatementData($statementFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'short_description' => $fake->word,
            'long_description' => $fake->word,
            'amount' => $fake->randomDigitNotNull,
            'currency' => $fake->word,
            'paid' => $fake->word,
            'geohost_id' => $fake->randomDigitNotNull
        ], $statementFields);
    }
}

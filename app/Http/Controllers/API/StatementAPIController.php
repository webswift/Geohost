<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateStatementAPIRequest;
use App\Http\Requests\API\UpdateStatementAPIRequest;
use App\Models\Statement;
use App\Repositories\StatementRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use InfyOm\Generator\Utils\ResponseUtil;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class StatementController
 * @package App\Http\Controllers\API
 */

class StatementAPIController extends InfyOmBaseController
{
    /** @var  StatementRepository */
    private $statementRepository;

    public function __construct(StatementRepository $statementRepo)
    {
        $this->statementRepository = $statementRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/statements",
     *      summary="Get a listing of the Statements.",
     *      tags={"Statement"},
     *      description="Get all Statements",
     *      produces={"application/json"},
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  type="array",
     *                  @SWG\Items(ref="#/definitions/Statement")
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function index(Request $request)
    {
        $this->statementRepository->pushCriteria(new RequestCriteria($request));
        $this->statementRepository->pushCriteria(new LimitOffsetCriteria($request));
        $statements = $this->statementRepository->all();

        return $this->sendResponse($statements->toArray(), 'Statements retrieved successfully');
    }

    /**
     * @param CreateStatementAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/statements",
     *      summary="Store a newly created Statement in storage",
     *      tags={"Statement"},
     *      description="Store Statement",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Statement that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Statement")
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/Statement"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateStatementAPIRequest $request)
    {
        $input = $request->all();

        $statements = $this->statementRepository->create($input);

        return $this->sendResponse($statements->toArray(), 'Statement saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/statements/{id}",
     *      summary="Display the specified Statement",
     *      tags={"Statement"},
     *      description="Get Statement",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Statement",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/Statement"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function show($id)
    {
        /** @var Statement $statement */
        $statement = $this->statementRepository->find($id);

        if (empty($statement)) {
            return Response::json(ResponseUtil::makeError('Statement not found'), 404);
        }

        return $this->sendResponse($statement->toArray(), 'Statement retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateStatementAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/statements/{id}",
     *      summary="Update the specified Statement in storage",
     *      tags={"Statement"},
     *      description="Update Statement",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Statement",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Statement that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Statement")
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/Statement"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateStatementAPIRequest $request)
    {
        $input = $request->all();

        /** @var Statement $statement */
        $statement = $this->statementRepository->find($id);

        if (empty($statement)) {
            return Response::json(ResponseUtil::makeError('Statement not found'), 404);
        }

        $statement = $this->statementRepository->update($input, $id);

        return $this->sendResponse($statement->toArray(), 'Statement updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/statements/{id}",
     *      summary="Remove the specified Statement from storage",
     *      tags={"Statement"},
     *      description="Delete Statement",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Statement",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  type="string"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function destroy($id)
    {
        /** @var Statement $statement */
        $statement = $this->statementRepository->find($id);

        if (empty($statement)) {
            return Response::json(ResponseUtil::makeError('Statement not found'), 404);
        }

        $statement->delete();

        return $this->sendResponse($id, 'Statement deleted successfully');
    }
}

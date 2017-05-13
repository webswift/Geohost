<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateRateAPIRequest;
use App\Http\Requests\API\UpdateRateAPIRequest;
use App\Models\Rate;
use App\Repositories\RateRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use InfyOm\Generator\Utils\ResponseUtil;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class RateController
 * @package App\Http\Controllers\API
 */

class RateAPIController extends InfyOmBaseController
{
    /** @var  RateRepository */
    private $rateRepository;

    public function __construct(RateRepository $rateRepo)
    {
        $this->rateRepository = $rateRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/rates",
     *      summary="Get a listing of the Rates.",
     *      tags={"Rate"},
     *      description="Get all Rates",
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
     *                  @SWG\Items(ref="#/definitions/Rate")
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
        $this->rateRepository->pushCriteria(new RequestCriteria($request));
        $this->rateRepository->pushCriteria(new LimitOffsetCriteria($request));
        $rates = $this->rateRepository->all();

        return $this->sendResponse($rates->toArray(), 'Rates retrieved successfully');
    }

    /**
     * @param CreateRateAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/rates",
     *      summary="Store a newly created Rate in storage",
     *      tags={"Rate"},
     *      description="Store Rate",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Rate that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Rate")
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
     *                  ref="#/definitions/Rate"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateRateAPIRequest $request)
    {
        $input = $request->all();

        $rates = $this->rateRepository->create($input);

        return $this->sendResponse($rates->toArray(), 'Rate saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/rates/{id}",
     *      summary="Display the specified Rate",
     *      tags={"Rate"},
     *      description="Get Rate",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Rate",
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
     *                  ref="#/definitions/Rate"
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
        /** @var Rate $rate */
        $rate = $this->rateRepository->find($id);

        if (empty($rate)) {
            return Response::json(ResponseUtil::makeError('Rate not found'), 404);
        }

        return $this->sendResponse($rate->toArray(), 'Rate retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateRateAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/rates/{id}",
     *      summary="Update the specified Rate in storage",
     *      tags={"Rate"},
     *      description="Update Rate",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Rate",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Rate that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Rate")
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
     *                  ref="#/definitions/Rate"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateRateAPIRequest $request)
    {
        $input = $request->all();

        /** @var Rate $rate */
        $rate = $this->rateRepository->find($id);

        if (empty($rate)) {
            return Response::json(ResponseUtil::makeError('Rate not found'), 404);
        }

        $rate = $this->rateRepository->update($input, $id);

        return $this->sendResponse($rate->toArray(), 'Rate updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/rates/{id}",
     *      summary="Remove the specified Rate from storage",
     *      tags={"Rate"},
     *      description="Delete Rate",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Rate",
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
        /** @var Rate $rate */
        $rate = $this->rateRepository->find($id);

        if (empty($rate)) {
            return Response::json(ResponseUtil::makeError('Rate not found'), 404);
        }

        $rate->delete();

        return $this->sendResponse($id, 'Rate deleted successfully');
    }
}

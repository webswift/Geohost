<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateGeoconfigAPIRequest;
use App\Http\Requests\API\UpdateGeoconfigAPIRequest;
use App\Models\Geoconfig;
use App\Repositories\GeoconfigRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use InfyOm\Generator\Utils\ResponseUtil;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class GeoconfigController
 * @package App\Http\Controllers\API
 */

class GeoconfigAPIController extends InfyOmBaseController
{
    /** @var  GeoconfigRepository */
    private $geoconfigRepository;

    public function __construct(GeoconfigRepository $geoconfigRepo)
    {
        $this->geoconfigRepository = $geoconfigRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/geoconfigs",
     *      summary="Get a listing of the Geoconfigs.",
     *      tags={"Geoconfig"},
     *      description="Get all Geoconfigs",
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
     *                  @SWG\Items(ref="#/definitions/Geoconfig")
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
        $this->geoconfigRepository->pushCriteria(new RequestCriteria($request));
        $this->geoconfigRepository->pushCriteria(new LimitOffsetCriteria($request));
        $geoconfigs = $this->geoconfigRepository->all();

        return $this->sendResponse($geoconfigs->toArray(), 'Geoconfigs retrieved successfully');
    }

    /**
     * @param CreateGeoconfigAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/geoconfigs",
     *      summary="Store a newly created Geoconfig in storage",
     *      tags={"Geoconfig"},
     *      description="Store Geoconfig",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Geoconfig that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Geoconfig")
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
     *                  ref="#/definitions/Geoconfig"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateGeoconfigAPIRequest $request)
    {
        $input = $request->all();

        $geoconfigs = $this->geoconfigRepository->create($input);

        return $this->sendResponse($geoconfigs->toArray(), 'Geoconfig saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/geoconfigs/{id}",
     *      summary="Display the specified Geoconfig",
     *      tags={"Geoconfig"},
     *      description="Get Geoconfig",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Geoconfig",
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
     *                  ref="#/definitions/Geoconfig"
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
        /** @var Geoconfig $geoconfig */
        $geoconfig = $this->geoconfigRepository->find($id);

        if (empty($geoconfig)) {
            return Response::json(ResponseUtil::makeError('Geoconfig not found'), 404);
        }

        return $this->sendResponse($geoconfig->toArray(), 'Geoconfig retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateGeoconfigAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/geoconfigs/{id}",
     *      summary="Update the specified Geoconfig in storage",
     *      tags={"Geoconfig"},
     *      description="Update Geoconfig",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Geoconfig",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Geoconfig that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Geoconfig")
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
     *                  ref="#/definitions/Geoconfig"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateGeoconfigAPIRequest $request)
    {
        $input = $request->all();

        /** @var Geoconfig $geoconfig */
        $geoconfig = $this->geoconfigRepository->find($id);

        if (empty($geoconfig)) {
            return Response::json(ResponseUtil::makeError('Geoconfig not found'), 404);
        }

        $geoconfig = $this->geoconfigRepository->update($input, $id);

        return $this->sendResponse($geoconfig->toArray(), 'Geoconfig updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/geoconfigs/{id}",
     *      summary="Remove the specified Geoconfig from storage",
     *      tags={"Geoconfig"},
     *      description="Delete Geoconfig",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Geoconfig",
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
        /** @var Geoconfig $geoconfig */
        $geoconfig = $this->geoconfigRepository->find($id);

        if (empty($geoconfig)) {
            return Response::json(ResponseUtil::makeError('Geoconfig not found'), 404);
        }

        $geoconfig->delete();

        return $this->sendResponse($id, 'Geoconfig deleted successfully');
    }
}

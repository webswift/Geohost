<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateGeoHostAPIRequest;
use App\Http\Requests\API\UpdateGeoHostAPIRequest;
use App\Models\GeoHost;
use App\Repositories\GeoHostRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use InfyOm\Generator\Utils\ResponseUtil;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class GeoHostController
 * @package App\Http\Controllers\API
 */

class GeoHostAPIController extends InfyOmBaseController
{
    /** @var  GeoHostRepository */
    private $geoHostRepository;

    public function __construct(GeoHostRepository $geoHostRepo)
    {
        $this->geoHostRepository = $geoHostRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/geoHosts",
     *      summary="Get a listing of the GeoHosts.",
     *      tags={"GeoHost"},
     *      description="Get all GeoHosts",
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
     *                  @SWG\Items(ref="#/definitions/GeoHost")
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
        var_dump($request);
        exit;

        $this->geoHostRepository->pushCriteria(new RequestCriteria($request));
        $this->geoHostRepository->pushCriteria(new LimitOffsetCriteria($request));
        $geoHosts = $this->geoHostRepository->all();

        return $this->sendResponse($geoHosts->toArray(), 'GeoHosts retrieved successfully');
    }

    /**
     * @param CreateGeoHostAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/geoHosts",
     *      summary="Store a newly created GeoHost in storage",
     *      tags={"GeoHost"},
     *      description="Store GeoHost",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="GeoHost that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/GeoHost")
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
     *                  ref="#/definitions/GeoHost"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateGeoHostAPIRequest $request)
    {
        $input = $request->all();

        $geoHosts = $this->geoHostRepository->create($input);

        return $this->sendResponse($geoHosts->toArray(), 'GeoHost saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/geoHosts/{id}",
     *      summary="Display the specified GeoHost",
     *      tags={"GeoHost"},
     *      description="Get GeoHost",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of GeoHost",
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
     *                  ref="#/definitions/GeoHost"
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
        /** @var GeoHost $geoHost */
        $geoHost = $this->geoHostRepository->find($id);

        if (empty($geoHost)) {
            return Response::json(ResponseUtil::makeError('GeoHost not found'), 404);
        }

        return $this->sendResponse($geoHost->toArray(), 'GeoHost retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateGeoHostAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/geoHosts/{id}",
     *      summary="Update the specified GeoHost in storage",
     *      tags={"GeoHost"},
     *      description="Update GeoHost",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of GeoHost",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="GeoHost that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/GeoHost")
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
     *                  ref="#/definitions/GeoHost"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateGeoHostAPIRequest $request)
    {
        $input = $request->all();

        /** @var GeoHost $geoHost */
        $geoHost = $this->geoHostRepository->find($id);

        if (empty($geoHost)) {
            return Response::json(ResponseUtil::makeError('GeoHost not found'), 404);
        }

        $geoHost = $this->geoHostRepository->update($input, $id);

        return $this->sendResponse($geoHost->toArray(), 'GeoHost updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/geoHosts/{id}",
     *      summary="Remove the specified GeoHost from storage",
     *      tags={"GeoHost"},
     *      description="Delete GeoHost",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of GeoHost",
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
        /** @var GeoHost $geoHost */
        $geoHost = $this->geoHostRepository->find($id);

        if (empty($geoHost)) {
            return Response::json(ResponseUtil::makeError('GeoHost not found'), 404);
        }

        $geoHost->delete();

        return $this->sendResponse($id, 'GeoHost deleted successfully');
    }
}

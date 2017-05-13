<?php

namespace App\Http\Controllers;

use App\DataTables\SimcardDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateSimcardRequest;
use App\Http\Requests\UpdateSimcardRequest;
use App\Models\Geoconfig;
use App\Models\Simcard;
use App\Repositories\SimcardRepository;
use Flash;
use InfyOm\Generator\Controller\AppBaseController;
use Response;
use Auth;
use App\Http\Middleware\AdminMiddleware;
use App\Models\GeoHost;

class SimcardController extends AppBaseController
{
    /** @var  SimcardRepository */
    private $simcardRepository;

    public function __construct(SimcardRepository $simcardRepo)
    {
        $this->simcardRepository = $simcardRepo;
        $this->middleware(AdminMiddleware::class);
    }

    /**
     * Display a listing of the Simcard.
     *
     * @param SimcardDataTable $simcardDataTable
     * @return Response
     */
    public function index(SimcardDataTable $simcardDataTable)
    {
        return $simcardDataTable->render('simcards.index');
    }

    /**
     * Show the form for creating a new Simcard.
     *
     * @return Response
     */
    public function create()
    {
        $geoHosts = GeoHost::getList();

//        return view('payments.create')->with(compact('geoHosts'));

        return view('simcards.create')->with(compact('geoHosts'));
    }

    /**
     * Store a newly created Simcard in storage.
     *
     * @param CreateSimcardRequest $request
     *
     * @return Response
     */
    public function store(CreateSimcardRequest $request)
    {
        $input = $request->all();

        $simcard = $this->simcardRepository->create($input);

        Flash::success('Simcard saved successfully.');

        return redirect(route('simcards.index'));
    }

    /**
     * Display the specified Simcard.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $simcard = $this->simcardRepository->findWithoutFail($id);

        if (empty($simcard)) {
            Flash::error('Simcard not found');

            return redirect(route('simcards.index'));
        }

        $geohost = GeoHost::findOrFail($simcard->geohost_id);
        $geohost_name = $geohost->firstname . ' ' . $geohost->lastname;

        return view('simcards.show')->with('simcard', $simcard)->with('geoHosts', GeoHost::getList())->with('full_name', $geohost_name);
    }

    /**
     * Show the form for editing the specified Simcard.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $simcard = $this->simcardRepository->findWithoutFail($id);

        if (empty($simcard)) {
            Flash::error('Simcard not found');

            return redirect(route('simcards.index'));
        }

        return view('simcards.edit')->with('simcard', $simcard)->with('geoHosts', GeoHost::getList());
    }

    /**
     * Update the specified Simcard in storage.
     *
     * @param  int              $id
     * @param UpdateSimcardRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSimcardRequest $request)
    {
        $simcard = $this->simcardRepository->findWithoutFail($id);

        if (empty($simcard)) {
            Flash::error('Simcard not found');

            return redirect(route('simcards.index'));
        }

        $simcard = $this->simcardRepository->update($request->all(), $id);

        Flash::success('Simcard updated successfully.');

        return redirect(route('simcards.index'));
    }

    /**
     * Remove the specified Simcard from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $simcard = $this->simcardRepository->findWithoutFail($id);

        if (empty($simcard)) {
            Flash::error('Simcard not found');

            return redirect(route('simcards.index'));
        }

        $this->simcardRepository->delete($id);

        Flash::success('Simcard deleted successfully.');

        return redirect(route('simcards.index'));
    }
}

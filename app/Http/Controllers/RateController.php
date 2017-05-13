<?php

namespace App\Http\Controllers;

use App\DataTables\RateDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateRateRequest;
use App\Http\Requests\UpdateRateRequest;
use App\Repositories\RateRepository;
use Flash;
use InfyOm\Generator\Controller\AppBaseController;
use Response;
use Auth;
use App\Http\Middleware\AdminMiddleware;

class RateController extends AppBaseController
{
    /** @var  RateRepository */
    private $rateRepository;

    public function __construct(RateRepository $rateRepo)
    {
        $this->rateRepository = $rateRepo;
        $this->middleware(AdminMiddleware::class);
    }

    /**
     * Display a listing of the Rate.
     *
     * @param RateDataTable $rateDataTable
     * @return Response
     */
    public function index(RateDataTable $rateDataTable)
    {
        return $rateDataTable->render('rates.index');
    }

    /**
     * Show the form for creating a new Rate.
     *
     * @return Response
     */
    public function create()
    {
        return view('rates.create');
    }

    /**
     * Store a newly created Rate in storage.
     *
     * @param CreateRateRequest $request
     *
     * @return Response
     */
    public function store(CreateRateRequest $request)
    {
        $input = $request->all();

        $rate = $this->rateRepository->create($input);

        Flash::success('Rate saved successfully.');

        return redirect(route('rates.index'));
    }

    /**
     * Display the specified Rate.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $rate = $this->rateRepository->findWithoutFail($id);

        if (empty($rate)) {
            return redirect(route('home'));
        }

        return view('rates.show')->with('rate', $rate);
    }

    /**
     * Show the form for editing the specified Rate.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $rate = $this->rateRepository->findWithoutFail($id);

        if (empty($rate)) {
            Flash::error('Rate not found');

            return redirect(route('rates.index'));
        }

        return view('rates.edit')->with('rate', $rate);
    }

    /**
     * Update the specified Rate in storage.
     *
     * @param  int              $id
     * @param UpdateRateRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateRateRequest $request)
    {
        $rate = $this->rateRepository->findWithoutFail($id);

        if (empty($rate)) {
            Flash::error('Rate not found');

            return redirect(route('rates.index'));
        }

        $rate = $this->rateRepository->update($request->all(), $id);

        Flash::success('Rate updated successfully.');

        return redirect(route('rates.index'));
    }

    /**
     * Remove the specified Rate from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $rate = $this->rateRepository->findWithoutFail($id);

        if (empty($rate)) {
            Flash::error('Rate not found');

            return redirect(route('rates.index'));
        }

        $this->rateRepository->delete($id);

        Flash::success('Rate deleted successfully.');

        return redirect(route('rates.index'));
    }
}

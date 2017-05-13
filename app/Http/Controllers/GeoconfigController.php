<?php

namespace App\Http\Controllers;

use App\DataTables\GeoconfigDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateGeoconfigRequest;
use App\Http\Requests\UpdateGeoconfigRequest;
use App\Models\Geoconfig;
use App\Repositories\GeoconfigRepository;
use Flash;
use InfyOm\Generator\Controller\AppBaseController;
use Response;
use Auth;
use App\Models\GeoHost;

class GeoconfigController extends AppBaseController
{
    /** @var  GeoconfigRepository */
    private $geoconfigRepository;

    public function __construct(GeoconfigRepository $geoconfigRepo)
    {
        $this->geoconfigRepository = $geoconfigRepo;
    }

    /**
     * Display a listing of the Geoconfig.
     *
     * @param GeoconfigDataTable $geoconfigDataTable
     * @return Response
     */
    public function index(GeoconfigDataTable $geoconfigDataTable)
    {
        return $geoconfigDataTable->render('geoconfigs.index');
    }

    /**
     * Show the form for creating a new Geoconfig.
     *
     * @return Response
     */
    public function create($geoHostId = null)
    {
        // Check if admin
        if (!Auth::user()->admin) {
            Flash::error('Invalid parameters');

            return redirect(route('home'));
        }

        if ($geoHostId == null)
        {
            $geoHosts = GeoHost::getList();

            return view('geoconfigs.create')->with(compact('geoHosts'));
        }
        else
            return view('geoconfigs.create')->with(['geoHostId' => $geoHostId]);
    }

    /**
     * Store a newly created Geoconfig in storage.
     *
     * @param CreateGeoconfigRequest $request
     *
     * @return Response
     */
    public function store(CreateGeoconfigRequest $request)
    {
        // Check if admin
        if(!Auth::user()->admin) {
            Flash::error('Invalid parameters');
        }

        $input = $request->all();

        $geoconfig = $this->geoconfigRepository->create($input);

        Flash::success('Geoconfig saved successfully.');

        return redirect(route('geoconfigs.index'));
    }

    /**
     * Display the specified Geoconfig.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $geoconfig = $this->geoconfigRepository->findWithoutFail($id);


        if(empty($geoconfig) || (!Auth::user()->admin && $geoconfig->geohost_id != Auth::user()->geohost_id)) {
            Flash::error('Geo Config not found');

            return redirect(route('geoconfigs.index'));
        }

        return view('geoconfigs.show')->with('geoconfig', $geoconfig);
    }

    /**
     * Show the form for editing the specified Geoconfig.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        // Check if admin
        if(!Auth::user()->admin) {
            Flash::error('Invalid parameters');

            return redirect(route('geoconfigs.index'));
        }


        $geoconfig = $this->geoconfigRepository->findWithoutFail($id);

        if (empty($geoconfig)) {
            Flash::error('Geoconfig not found');

            return redirect(route('geoconfigs.index'));
        }

        return view('geoconfigs.edit')->with('geoconfig', $geoconfig)->with('geoHostId', $id);
    }

    /**
     * Update the specified Geoconfig in storage.
     *
     * @param  int              $id
     * @param UpdateGeoconfigRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateGeoconfigRequest $request)
    {
        // Check if admin
        if(!Auth::user()->admin) {
            Flash::error('Invalid parameters');

            return redirect(route('geoconfigs.index'));
        }


        $geoconfig = $this->geoconfigRepository->findWithoutFail($id);

        if (empty($geoconfig)) {
            Flash::error('Geoconfig not found');

            return redirect(route('geoconfigs.index'));
        }

        $geoconfig = $this->geoconfigRepository->update($request->all(), $id);

        Flash::success('Geoconfig updated successfully.');

        return redirect(route('geoconfigs.index'));
    }

    /**
     * Remove the specified Geoconfig from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        // Check if admin
        if(!Auth::user()->admin) {
            Flash::error('Invalid parameters');

            return redirect(route('geoconfigs.index'));
        }


        $geoconfig = $this->geoconfigRepository->findWithoutFail($id);

        if (empty($geoconfig)) {
            Flash::error('Geoconfig not found');

            return redirect(route('geoconfigs.index'));
        }

        $this->geoconfigRepository->delete($id);

        Flash::success('Geoconfig deleted successfully.');

        return redirect(route('geoconfigs.index'));
    }

    public function getList()
    {
        // check if its our form
//        if (Session::token() !== Input::get('_token') ) {
//            return Response::json(array(
//                'msg' => 'Unauthorized attempt to create setting'
//            ));
//        }

        $geoconfigs = Geoconfig::where('geohost_id', $_REQUEST['geohost_id'])->get();

        $geoconfig_list = array();

        foreach($geoconfigs as $geoconfig){
            $geoconfig_list[] = array('key' => $geoconfig->id, 'value' => $geoconfig->machine_id . " : " . $geoconfig->host_ip);
        }

        $response = array(
            'status' => 'success',
            'msg' => 'Setting created successfully',
            'data' => $geoconfig_list
        );

        return Response::json($response);
    }
}

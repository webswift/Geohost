<?php

namespace App\Http\Controllers;

use App\DataTables\GeoHostDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateGeoHostRequest;
use App\Http\Requests\UpdateGeoHostRequest;
use App\Repositories\GeoHostRepository;
use Flash;
use InfyOm\Generator\Controller\AppBaseController;
use Response;
use DB;
use App\User;
use Illuminate\Support\Facades\Auth;

class GeoHostController extends AppBaseController
{
    /** @var  GeoHostRepository */
    private $geoHostRepository;

    public function __construct(GeoHostRepository $geoHostRepo)
    {
        $this->geoHostRepository = $geoHostRepo;
    }

    /**
     * Display a listing of the GeoHost.
     *
     * @param GeoHostDataTable $geoHostDataTable
     * @return Response
     */
    public function index(GeoHostDataTable $geoHostDataTable)
    {
        return $geoHostDataTable->render('geoHosts.index');
    }

    /**
     * Show the form for creating a new GeoHost.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function create($userId = null)
    {
        // Check if admin
        if (!Auth::user()->admin) {
            Flash::error('Invalid parameters');

            return redirect(route('home'));
        }

        if ($userId == null)
        {
            $users = User::getGeoHostList();

            return view('geoHosts.create')->with(compact('users'));
        }
        else
            return view('geoHosts.create')->with(['userId' => $userId]);
    }

    /**
     * Store a newly created GeoHost in storage.
     *
     * @param CreateGeoHostRequest $request
     *
     * @return Response
     */
    public function store(CreateGeoHostRequest $request)
    {
        if (Auth::guest()) {
            return redirect(route('home'));
        }

        $inputAll = $request->all();
        $inputGeoHost = $request->except('user_id');

        $geoHost = $this->geoHostRepository->create($inputGeoHost);

        $user = User::whereId($inputAll['user_id'])->firstOrFail();
        $user->geohost_id = $geoHost->id;
        $user->save();

        Flash::success('GeoHost saved successfully.');

        return redirect(route('geoHosts.index'));
    }

    /**
     * Display the specified GeoHost.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        if(Auth::guest()) {
            return redirect(route('home'));
        }

        $geoHost = $this->geoHostRepository->findWithoutFail($id);

        // Check if admin or the document belongs to that user

        if(empty($geoHost) || !Auth::user()->admin && $id != Auth::user()->geohost_id) {
            Flash::error('GeoHost not found');

            return redirect(route('geoHosts.index'));
        }

        $balances = DB::select('select geohost_id,sum(amount) as amount, currency from (
	                                select sum(amount) as amount, statements.currency as currency, geohost_id
					                    from statements where geohost_id=? group by geohost_id,currency
	                                union
                                    select -sum(amount) as amount, payments.currency as currency, geohost_id
					                    from payments where geohost_id=? group by geohost_id,currency
                                ) as a group by geohost_id,currency;', [$id, $id]);

        return view('geoHosts.show', ['geoHost' =>  $geoHost, 'balances' => $balances]);
    }

    /**
     * Show the form for editing the specified GeoHost.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        // Check if admin or the document belongs to that user
        if(!Auth::user()->admin && $id != Auth::user()->geohost_id) {
            Flash::error('Invalid parameters');

            return redirect(route('home'));
        }

        if (!Auth::user()->admin) {
            Flash::error('Invalid parameters');

            return redirect(route('geoHosts.index'));
        }

        $geoHost = $this->geoHostRepository->findWithoutFail($id);

        if (empty($geoHost)) {
            Flash::error('GeoHost not found');

            return redirect(route('geoHosts.index'));
        }

        return view('geoHosts.edit')->with('geoHost', $geoHost)->with('userId', Auth::user()->id);
    }

    /**
     * Update the specified GeoHost in storage.
     *
     * @param  int              $id
     * @param UpdateGeoHostRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateGeoHostRequest $request)
    {
        // Check if admin or the document belongs to that user
        if(!Auth::user()->admin && $id != Auth::user()->geohost_id) {
            Flash::error('Invalid parameters');

            return redirect(route('home'));
        }

        $geoHost = $this->geoHostRepository->findWithoutFail($id);

        if (empty($geoHost)) {
            Flash::error('GeoHost not found');

            return redirect(route('geoHosts.index'));
        }

        $geoHost = $this->geoHostRepository->update($request->except('user_id'), $id);

        Flash::success('GeoHost updated successfully.');

        return redirect(route('geoHosts.index'));
    }

    /**
     * Remove the specified GeoHost from storage.
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

            return redirect(route('home'));
        }


        $geoHost = $this->geoHostRepository->findWithoutFail($id);

        if (empty($geoHost)) {
            Flash::error('GeoHost not found');

            return redirect(route('geoHosts.index'));
        }

        $this->geoHostRepository->delete($id);

        Flash::success('GeoHost deleted successfully.');

        return redirect(route('geoHosts.index'));
    }
}

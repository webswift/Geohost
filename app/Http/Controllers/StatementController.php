<?php

namespace App\Http\Controllers;

use App\DataTables\StatementDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateStatementRequest;
use App\Http\Requests\UpdateStatementRequest;
use App\Repositories\StatementRepository;
use Flash;
use InfyOm\Generator\Controller\AppBaseController;
use Response;
use Illuminate\Support\Facades\Auth;
use App\Models\Statement;
use App\Models\GeoHost;
use App\Models\Rate;
use Illuminate\Support\Facades\DB;

class StatementController extends AppBaseController
{
    /**
     * Store a newly created Statement in storage.
     *
     * @param CreateStatementRequest $request
     *
     * @return Response
     */
    public function store(CreateStatementRequest $request)
    {
        // Check if admin
        if(!Auth::user()->admin) {
            Flash::error('Invalid parameters');

            return redirect(route('statements.index'));
        }


        $input = $request->all();
        $this->statementRepository->create($input);

        Flash::success('Statement saved successfully.');

        return redirect(route('statements.index'));
    }

    /** @var  StatementRepository */
    private $statementRepository;

    public function __construct(StatementRepository $statementRepo)
    {
        $this->statementRepository = $statementRepo;
    }

    /**
     * Display a listing of the Statement.
     *
     * @param StatementDataTable $statementDataTable
     * @return Response
     */
    public function index(StatementDataTable $statementDataTable)
    {
        if (!isset($_REQUEST['showMode']))
            Statement::setShowAll(false);
        else
            Statement::setShowAll($_REQUEST['showMode']);

        $view = $statementDataTable->render('statements.index');
        $view->ShowAllCaption = (Statement::isShowAll()) ? "UnPaid" : "Show All";

        return $view;
    }

    /**
     * Show the form for creating a new Statement.
     *
     * @return Response
     */
    public function create()
    {
        // Check if admin
        if (Auth::user()->admin) {
            $geoHosts = GeoHost::getList();
            $rates = Rate::getList();
            return view('statements.create')->with(compact('geoHosts', 'rates'));
        }
        else {
            return view('statements.create')->with(['geoHostId' => Auth::user()->geohost_id]);

            Flash::error('Invalid parameters');

            return redirect(route('statements.index'));
        }
    }

    /**
     * Display the specified Statement.
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

        $statement = $this->statementRepository->findWithoutFail($id);

        if(empty($statement) || (!Auth::user()->admin && $statement->geohost_id != Auth::user()->geohost_id)) {
            Flash::error('Statement not found');

            return redirect(route('statements.index'));
        }

        $geohost = GeoHost::findOrFail($statement->geohost_id);
        $geohost_name = $geohost->firstname . ' ' . $geohost->lastname;

        return view('statements.show')->with('statement', $statement)->with('full_name', $geohost_name);
    }

    /**
     * Show the form for editing the specified Statement.
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

            return redirect(route('statements.index'));
        }

        $statement = $this->statementRepository->findWithoutFail($id);

        if (empty($statement)) {
            Flash::error('Statement not found');

            return redirect(route('statements.index'));
        }

        return view('statements.edit')->with('statement', $statement)->with('geoHosts', GeoHost::getList())->with('rates', Rate::getList());
    }

    /**
     * Update the specified Statement in storage.
     *
     * @param  int              $id
     * @param UpdateStatementRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateStatementRequest $request)
    {
        // Check if admin
        if(!Auth::user()->admin) {
            Flash::error('Invalid parameters');

            return redirect(route('statements.index'));
        }


        $statement = $this->statementRepository->findWithoutFail($id);

        if (empty($statement)) {
            Flash::error('Statement not found');

            return redirect(route('statements.index'));
        }

        $statement = $this->statementRepository->update($request->all(), $id);

        Flash::success('Statement updated successfully.');

        return redirect(route('statements.index'));
    }

    /**
     * Remove the specified Statement from storage.
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

            return redirect(route('statements.index'));
       }


        $statement = $this->statementRepository->findWithoutFail($id);

        if (empty($statement)) {
            Flash::error('Statement not found');

            return redirect(route('statements.index'));
        }

        $this->statementRepository->delete($id);

        Flash::success('Statement deleted successfully.');

        return redirect(route('statements.index'));
    }

    // for Ajax
    public function getList()
    {
        // check if its our form
//        if (Session::token() !== Input::get('_token') ) {
//            return Response::json(array(
//                'msg' => 'Unauthorized attempt to create setting'
//            ));
//        }

        $statements = Statement::where('geohost_id', $_REQUEST['geohost_id'])->get();

        $statement_list = array();

        foreach($statements as $statement){
            $statement_list[] = array('key' => $statement->id, 'value' => $statement->amount . " : " . $statement->short_description);
        }

        $response = array(
            'status' => 'success',
            'msg' => 'Setting created successfully',
            'data' => $statement_list
        );

        return Response::json($response);
    }

    public function getItem()
    {
        // check if its our form
//        if (Session::token() !== Input::get('_token') ) {
//            return Response::json(array(
//                'msg' => 'Unauthorized attempt to create setting'
//            ));
//        }

        $statement = Statement::where('id', $_REQUEST['statement_id'])->get();

        $statement_item = array('amount' => $statement[0]->amount, 'currency' => $statement[0]->currency);

        $response = array(
            'status' => 'success',
            'msg' => 'Setting created successfully',
            'data' => $statement_item
        );

        return Response::json($response);
    }
}

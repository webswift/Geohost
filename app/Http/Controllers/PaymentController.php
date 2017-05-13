<?php

namespace App\Http\Controllers;

use App\DataTables\PaymentDataTable;
use App\Http\Requests;
use App\Http\Requests\CreatePaymentRequest;
use App\Http\Requests\UpdatePaymentRequest;
use App\Models\Statement;
use App\Repositories\PaymentRepository;
use Flash;
use InfyOm\Generator\Controller\AppBaseController;
use Response;
use Illuminate\Support\Facades\Auth;
use App\Models\GeoHost;
use App\Models\Rate;
use Illuminate\Support\Facades\DB;

class PaymentController extends AppBaseController
{
    /** @var  PaymentRepository */
    private $paymentRepository;

    public function __construct(PaymentRepository $paymentRepo)
    {
        $this->paymentRepository = $paymentRepo;
    }

    /**
     * Display a listing of the Payment.
     *
     * @param PaymentDataTable $paymentDataTable
     * @return Response
     */
    public function index(PaymentDataTable $paymentDataTable)
    {
        return $paymentDataTable->render('payments.index');
    }

    /**
     * Show the form for creating a new Payment.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|Response
     */
    public function create()
    {
        // Check if admin
        if(!Auth::user()->admin) {
            Flash::error('Invalid parameters');

            return redirect(route('payments.index'));
        }

        if (!isset($_REQUEST['statementId']))
        {
            $geoHosts = GeoHost::getList();
            $rates = Rate::getList();

            return view('payments.create')->with(compact('geoHosts','rates'));
        }
        else
        {
            $statement = Statement::where('id', $_REQUEST['statementId'])->first();

            return view('payments.create')->with(['statement' => $statement]);
        }
    }

    /**
     * Store a newly created Payment in storage.
     *
     * @param CreatePaymentRequest $request
     *
     * @return Response
     */
    public function store(CreatePaymentRequest $request)
    {
        // Check if admin
        if(!Auth::user()->admin) {
            Flash::error('Invalid parameters');
        }

        $input = $request->all();

        $payment = $this->paymentRepository->create($input);

        // Save statement ID
        for ($i = 0; $i < sizeof($input['statement_id']); $i++)
        {
            $statement_id = $input['statement_id'][$i];
            $statement = Statement::where('id', $statement_id)->first();
            $statement->payment_id = $payment->id;

            $statement->save();
        }

        Flash::success('Payment saved successfully.');

        return redirect(route('payments.index'));
    }

    /**
     * Display the specified Payment.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $payment = $this->paymentRepository->findWithoutFail($id);

        if(empty($payment) || (!Auth::user()->admin && $payment->geohost_id != Auth::user()->geohost_id)) {
            Flash::error('Payment not found');

            return redirect(route('payments.index'));
        }

        $geohost = GeoHost::findOrFail($payment->geohost_id);
        $geohost_name = $geohost->firstname . ' ' . $geohost->lastname;

        return view('payments.show')->with('payment', $payment)->with('full_name', $geohost_name);
    }

    /**
     * Show the form for editing the specified Payment.
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

            return redirect(route('payments.index'));
        }


        $payment = $this->paymentRepository->findWithoutFail($id);

        if (empty($payment)) {
            Flash::error('Payment not found');

            return redirect(route('payments.index'));
        }

        return view('payments.edit')->with('payment', $payment)->with('geoHosts', GeoHost::getList())->with('rates', Rate::getList());
    }

    /**
     * Update the specified Payment in storage.
     *
     * @param  int              $id
     * @param UpdatePaymentRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePaymentRequest $request)
    {
        // Check if admin
        if(!Auth::user()->admin) {
            Flash::error('Invalid parameters');

            return redirect(route('payments.index'));
        }


        $payment = $this->paymentRepository->findWithoutFail($id);

        if (empty($payment)) {
            Flash::error('Payment not found');

            return redirect(route('payments.index'));
        }

        $payment = $this->paymentRepository->update($request->all(), $id);

        Flash::success('Payment updated successfully.');

        return redirect(route('payments.index'));
    }

    /**
     * Remove the specified Payment from storage.
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

            return redirect(route('payments.index'));
        }


        $payment = $this->paymentRepository->findWithoutFail($id);

        if (empty($payment)) {
            Flash::error('Payment not found');

            return redirect(route('payments.index'));
        }

        $this->paymentRepository->delete($id);

        Flash::success('Payment deleted successfully.');

        return redirect(route('payments.index'));
    }
}

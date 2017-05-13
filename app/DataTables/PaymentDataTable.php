<?php

namespace App\DataTables;

use App\Models\Payment;
use Form;
use Yajra\Datatables\Services\DataTable;
use Auth;

class PaymentDataTable extends DataTable
{

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function ajax()
    {
        return $this->datatables
            ->eloquent($this->query())
            ->editColumn('GeoHost Name', function ($row) {
                return $row->firstname . ' ' . $row->lastname; })
            ->addColumn('action', 'payments.datatables_actions')
            ->make(true);
    }

    /**
     * Get the query object to be processed by datatables.
     *
     * @return \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        // If not admin, limit by geohost_id
        if(!Auth::user()->admin) {
            $geohost_id = Auth::user()->geohost_id;
            $payments = Payment::query()->where('geohost_id', $geohost_id)
                        ->leftJoin('geo_hosts', 'geo_hosts.id', '=', 'payments.geohost_id')
                        ->select([
                            'payments.*',
                            'geo_hosts.firstname',
                            'geo_hosts.lastname'
                        ]);
        }
        else {
            $payments = Payment::query()
                        ->leftJoin('geo_hosts', 'geo_hosts.id', '=', 'payments.geohost_id')
                        ->select([
                            'payments.*',
                            'geo_hosts.firstname',
                            'geo_hosts.lastname'
                        ]);
        }


        return $this->applyScopes($payments);
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\Datatables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->columns($this->getColumns())
            ->addAction(['width' => '10%'])
            ->ajax('')
            ->parameters([
                'dom' => 'Bfrtip',
                'scrollX' => false,
                'buttons' => [
                    'create',
                    'print',
                    'reset',
                    'reload',
                    [
                         'extend'  => 'collection',
                         'text'    => '<i class="fa fa-download"></i> Export',
                         'buttons' => [
                             'csv',
                             'excel',
                             'pdf',
                         ],
                    ]
                ]
            ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    private function getColumns()
    {
        return [
            'amount' => ['name' => 'amount', 'data' => 'amount'],
            'currency' => ['name' => 'currency', 'data' => 'currency'],
            'description' => ['name' => 'description', 'data' => 'description'],
            'geoHost Name' => ['name' => 'geoHost Name', 'data' => 'GeoHost Name']
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'payments';
    }
}

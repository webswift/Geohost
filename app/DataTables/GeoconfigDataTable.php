<?php

namespace App\DataTables;

use App\Models\Geoconfig;
use Form;
use Yajra\Datatables\Services\DataTable;
use Auth;

class GeoconfigDataTable extends DataTable
{

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function ajax()
    {
        return $this->datatables
            ->eloquent($this->query())
            ->editColumn('geoHost_name', function ($row) {
                return $row->firstname . ' ' . $row->lastname; })
            ->addColumn('action', 'geoconfigs.datatables_actions')
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
            $geoconfigs = Geoconfig::query()->where('geohost_id', $geohost_id)
                            ->leftJoin('geo_hosts', 'geo_hosts.id', '=', 'geoconfigs.geohost_id')
                            ->select([
                                'geoconfigs.*',
                                'geo_hosts.firstname',
                                'geo_hosts.lastname'
                            ]);
        }
        else {
            $geoconfigs = Geoconfig::query()
                            ->leftJoin('geo_hosts', 'geo_hosts.id', '=', 'geoconfigs.geohost_id')
                            ->select([
                                'geoconfigs.*',
                                'geo_hosts.firstname',
                                'geo_hosts.lastname'
                            ]);
        }


        return $this->applyScopes($geoconfigs);
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
                'machine_id',
                'host_ip',
                'host_port',
                'guest_ip',
                'country_code',
                'region',
                'city',
                'dma',
                'status',
                'geo_type',
                'geo_device',
                'geo_provider',
                'updated_at',
                'start_date',
                'monthly_payment',
                'payment_frequency',
                'payment_status',
                'geoHost_name'
            ];

    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'geoconfigs';
    }
}

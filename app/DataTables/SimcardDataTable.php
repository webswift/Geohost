<?php

namespace App\DataTables;

use App\Models\Simcard;
use Form;
use Yajra\Datatables\Services\DataTable;

class SimcardDataTable extends DataTable
{

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function ajax()
    {
        return $this->datatables
            ->eloquent($this->query())
            ->editColumn('full_name', function ($row) {
                return $row->firstname . ' ' . $row->lastname; })
//            ->editColumn('device', function ($row) {
//                return $row->machine_id; })
            ->addColumn('action', 'simcards.datatables_actions')
            ->make(true);
    }

    /**
     * Get the query object to be processed by datatables.
     *
     * @return \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        $simcards = Simcard::query()
            ->leftJoin('geo_hosts', 'geo_hosts.id', '=', 'simcards.geohost_id')
//            ->leftJoin('geoconfigs', 'geoconfigs.id', '=', 'simcards.geoconfig_id')
            ->select([
                'simcards.*',
                'geo_hosts.firstname',
                'geo_hosts.lastname',
//                'geoconfigs.machine_id'
            ]);

        return $this->applyScopes($simcards);
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
            'geoconfig_id'      , // => ['name' => 'geoconfig_id', 'data' => 'geoconfig_id'],
          //'device'            , // => ['name' => 'geoconfig_id', 'data' => 'geoconfig_id'],
            'full_name'         , // => ['name' => 'geohost_id', 'data' => 'geohost_id'],
            'provider'          , // => ['name' => 'provider', 'data' => 'provider'],
            'network'           , // => ['name' => 'network', 'data' => 'network'],
            'location'          , // => ['name' => 'location', 'data' => 'location'],
            'country'             // => ['name' => 'country', 'data' => 'country']
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'simcards';
    }
}
